<?php

include(__DIR__ . './database.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Image -----------
      $uploadDir = '../uploads/';

      if (isset($_FILES['N_Image'])) {
          $file = $_FILES['N_Image'];
          $fileName = basename($file['name']);
          $targetPath = $uploadDir . $fileName;

          // Verifier les erreurs
          if ($file['error'] === UPLOAD_ERR_OK) {

              $fileType = mime_content_type($file['tmp_name']);
              if (in_array($fileType, ['photo/jpeg', 'photo/png', 'photo/gif', 'image/jpeg', 'image/png', 'image/gif'])) {
                  if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                      $N_Image = $targetPath;
                  } else {
                      echo "Erreur lors du deplacement du fichier.";
                  }
              } else {
                  echo "Seules les photos (JPEG, PNG, GIF) sont autorisées.";
              }
          } else {
              echo "Erreur lors de l'upload : " . $file['error'];
          }
      } else {
          echo "Aucun fichier envoyé.";
      }

      $N_Name = $_POST['N_Name'];
      $id = $_GET['id'];

      $stmt = $conn->prepare("UPDATE nationality SET  N_Name = ?, N_Image = ? WHERE N_id = $id" );

      $stmt->bind_param("ss", $N_Name, $N_Image);

      if ($stmt->execute()) {
          header("location:../admine/NatList.php");
      } else {
          echo "Erreur : " . $stmt->error;
      }

      $stmt->close();
  }

  $conn->close();
?>
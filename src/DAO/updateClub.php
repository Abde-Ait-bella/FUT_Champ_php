<?php

include(__DIR__ . './database.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Image -----------
      $uploadDir = '../uploads/';

      if (isset($_FILES['team_image'])) {
          $file = $_FILES['team_image'];
          $fileName = basename($file['name']);
          $targetPath = $uploadDir . $fileName;

          // Verifier les erreurs
          if ($file['error'] === UPLOAD_ERR_OK) {

              $fileType = mime_content_type($file['tmp_name']);
              if (in_array($fileType, ['photo/jpeg', 'photo/png', 'photo/gif', 'image/jpeg', 'image/png', 'image/gif'])) {
                  if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                      $team_image = $targetPath;
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

      $team_name = $_POST['team_name'];
      $id = $_GET['id'];

      $stmt = $conn->prepare("UPDATE teams SET  team_name = ?, team_image = ? WHERE team_id = $id" );

      $stmt->bind_param("ss", $team_name, $team_image);

      if ($stmt->execute()) {
          header("location:../admine/clubList.php");
      } else {
          echo "Erreur : " . $stmt->error;
      }

      $stmt->close();
  }

  $conn->close();
?>
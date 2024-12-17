<?php

include(__DIR__ . '/../includes/database.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Image -----------
      $uploadDir = 'uploads/';

      if (isset($_FILES['photo'])) {
          $file = $_FILES['photo'];
          $fileName = basename($file['name']);
          $targetPath = $uploadDir . $fileName;

          // Verifier les erreurs
          if ($file['error'] === UPLOAD_ERR_OK) {

              $fileType = mime_content_type($file['tmp_name']);
              echo $fileType . "<br>";
              if (in_array($fileType, ['photo/jpeg', 'photo/png', 'photo/gif', 'image/jpeg', 'image/png', 'image/gif'])) {
                  echo "yess";
                  if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                      $photo = $targetPath;
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

      $name = $_POST['name'];
      $position = $_POST['position'];

      $stmt = $conn->prepare("INSERT INTO players (player_name, N_id, photo, player_position, team_id) VALUES (?, 1, ?, ?, 1)");

      $stmt->bind_param("sss", $name, $photo, $position);

      if ($stmt->execute()) {
          echo "Données insérées avec succès.";
      } else {
          echo "Erreur : " . $stmt->error;
      }

      $stmt->close();
  }

  $conn->close();

?>
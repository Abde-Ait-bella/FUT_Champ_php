<?php

include(__DIR__ . './database.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Image -----------
      $uploadDir = '../admine/uploads/';

      if (isset($_FILES['photo'])) {
          $file = $_FILES['photo'];
          $fileName = basename($file['name']);
          $targetPath = $uploadDir . $fileName;

          // Verifier les erreurs
          if ($file['error'] === UPLOAD_ERR_OK) {

              $fileType = mime_content_type($file['tmp_name']);
              if (in_array($fileType, ['photo/jpeg', 'photo/png', 'photo/gif', 'image/jpeg', 'image/png', 'image/gif'])) {
                  echo $fileType . "<br>";
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
      $player_position = $_POST['position'];
      $team_id = $_POST['logo'];
      $N_id = $_POST['flag'];
      $player_rating = $_POST['rating'];
      $player_pace = $_POST['pace'];
      $player_shooting = $_POST['shooting'];
      $player_passing = $_POST['passing'];
      $player_dribbling = $_POST['dribbling'];
      $player_defending = $_POST['defending'];
      $player_physical = $_POST['physical'];

      $stmt = $conn->prepare("INSERT INTO players (player_name, photo,  player_position, N_id , player_rating, player_pace, player_shooting, player_passing, player_dribbling, player_defending, player_physical, team_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

      $stmt->bind_param("sssiiiiiiiii", $name, $photo, $player_position, $N_id, $player_rating, $player_pace, $player_shooting, $player_passing, $player_dribbling, $player_defending, $player_physical , $team_id);

      if ($stmt->execute()) {
          echo "Données insérées avec succès.";
          header("location:../admine/addPlayer.php");
      } else {
          echo "Erreur : " . $stmt->error;
      }

      $stmt->close();
  }

  $conn->close();


?>
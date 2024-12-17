<?php
    include './database.php';
    if ($conn) {
        echo 'test';
    }
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM players WHERE player_id=$id");

    if ($stmt->execute()) {
        header("location:../admine/dashboard.php");
    } else {
        echo "Erreur : " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
?>
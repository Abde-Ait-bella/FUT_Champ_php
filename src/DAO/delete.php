<?php
    include './database.php';

    $id = $_GET['id'];
    $table = $_GET['table'];
    $culumn_id = $_GET['column'];

    echo $culumn_id;
    $stmt = $conn->prepare("DELETE FROM $table WHERE  $culumn_id = $id");

    $redirect_path = $table == "nationality" ? "natList.php" : ($table == "teams" ? "clubList.php" : "dashboard.php");

    echo $redirect_path;
    if ($stmt->execute()) {
        header("location:../admine/$redirect_path");
    } else {
        echo "Erreur : " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
?>
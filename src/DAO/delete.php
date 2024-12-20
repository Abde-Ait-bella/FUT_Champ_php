<?php
    include './database.php';

    $id = $_GET['id'];
    $table = $_GET['table'];
    $culumn_id = $_GET['column'];

    echo $culumn_id;
    $stmt = $conn->prepare("DELETE FROM $table WHERE  $culumn_id = $id");

    if ($stmt->execute()) {
        header("location:../admine/dashboard.php");
    } else {
        echo "Erreur : " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
?>
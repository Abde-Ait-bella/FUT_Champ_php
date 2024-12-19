<?php
        include(__DIR__.'/../DAO/database.php');

        $sql_Nationality = "SELECT * FROM nationality";
        $sql_Club = "SELECT * FROM teams";
        $sql_Players = "SELECT * FROM players";

        $result_Nationality = $conn->query($sql_Nationality);
        $result_Club = $conn->query($sql_Club);
        $result_Players = $conn->query($sql_Players);

        // $row_Nationality = $result_Nationality->fetch_assoc();
        // $row_Club = $result_Club->fetch_assoc();
        // $row_Players = $result_Players->fetch_assoc();
?>
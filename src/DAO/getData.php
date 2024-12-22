<?php
include(__DIR__ . '/../DAO/database.php');

$sql_Nationality = "SELECT * FROM nationality";
$sql_Club = "SELECT * FROM teams";
$sql_Players = "SELECT * FROM players";
$sql_Players_join = "SELECT * FROM players AS P JOIN teams AS T ON P.team_id = T.team_id JOIN nationality AS N ON P.N_id = N.N_id";

$result_Nationality = $conn->query($sql_Nationality);
$result_Club = $conn->query($sql_Club);
$result_Players = $conn->query($sql_Players);
$result_Players_all = $conn->query($sql_Players_join);



$row_Nationality = $result_Nationality->fetch_assoc();
$row_Club = $result_Club->fetch_assoc();
$row_Players = $result_Players->fetch_assoc();

?>
<?php
include(__DIR__ . '/../DAO/database.php');

$sql_Players_join = "SELECT * FROM players AS P JOIN teams AS T ON P.team_id = T.team_id JOIN nationality AS N ON P.N_id = N.N_id";
$result_Players_all = $conn->query($sql_Players_join);
echo json_encode($result_Players_all->fetch_all(MYSQLI_ASSOC));

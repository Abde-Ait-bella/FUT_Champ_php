<?php
include(__DIR__ . '/../DAO/database.php');

$sql_Nationality = "SELECT * FROM nationality";
$sql_Club = "SELECT * FROM teams";
$sql_Players = "SELECT * FROM players";
$sql_Players_join = "SELECT * FROM players AS P JOIN teams AS T ON P.team_id = T.team_id JOIN nationality AS N ON P.N_id = N.N_id";
$sql_Players_count = "SELECT count(player_id) AS countPlayer FROM players";
$sql_teams_count = "SELECT count(team_id) AS countTeams FROM teams";
$sql_nationality_count = "SELECT count(N_id) AS countNationality FROM nationality";
// $sql_Players_count = "SELECT T.teams_name count(*) FROM players AS P JOIN teams AS T ON P.team_id = T.team_id JOIN nationality AS N ON P.N_id = N.N_id GROUP BY T.teams_name";

$result_Nationality = $conn->query($sql_Nationality);
$result_Club = $conn->query($sql_Club);
$result_Players = $conn->query($sql_Players);
$result_Players_all = $conn->query($sql_Players_join);

$result_Players_count = $conn->query($sql_Players_count);
$result_teams_count = $conn->query($sql_teams_count);
$result_nationality_count = $conn->query($sql_nationality_count);

$row_Nationality = $result_Nationality->fetch_assoc();
$row_Club = $result_Club->fetch_assoc();
$row_Players = $result_Players->fetch_assoc();

?>
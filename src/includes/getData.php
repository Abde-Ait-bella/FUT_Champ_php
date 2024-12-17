<?php
include './database.php';

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
echo "Connexion réussie !<br>";

$sql = "SELECT player_id, player_name, player_position FROM players";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row['player_id'] . " - Nom : " . $row['player_name'] . " - Position : " . $row['player_position'] . "<br>";
    }
} else {
    echo "Aucun joueur trouvé.";
}

$conn->close();
?>

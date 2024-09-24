<?php
include 'config.php';

$sql = "SELECT e.id_evenement, e.nom, e.date, e.lieu, c.nom AS client, eq.nom AS equipe 
        FROM Événements e 
        JOIN Clients c ON e.id_client = c.id_client 
        JOIN Équipes eq ON e.id_equipe = eq.id_equipe";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_evenement"]. " - Nom: " . $row["nom"]. " - Date: " . $row["date"]. " - Lieu: " . $row["lieu"]. " - Client: " . $row["client"]. " - Équipe: " . $row["equipe"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>

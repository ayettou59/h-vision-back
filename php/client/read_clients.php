<?php
include 'config.php';

$sql = "SELECT * FROM Clients";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_client"]. " - Nom: " . $row["nom"]. " - Adresse: " . $row["adresse"]. " - Téléphone: " . $row["telephone"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>

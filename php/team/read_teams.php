<?php
include 'config.php';

$sql = "SELECT * FROM Équipes";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_equipe"]. " - Nom: " . $row["nom"]. " - Description: " . $row["description"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>

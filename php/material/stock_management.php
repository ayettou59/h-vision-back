<?php
include 'config.php';

$sql = "SELECT * FROM Matériels";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_materiel"]. " - Nom: " . $row["nom"]. " - Catégorie: " . $row["categorie"]. " - Quantité: " . $row["quantite"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>

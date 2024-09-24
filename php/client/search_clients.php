<form action="search_clients.php" method="get">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="adresse" placeholder="Adresse">
    <input type="text" name="telephone" placeholder="Téléphone">
    <button type="submit">Rechercher</button>
</form>
<?php
include 'config.php';

$nom = $_GET['nom'];
$adresse = $_GET['adresse'];
$telephone = $_GET['telephone'];

$sql = "SELECT * FROM Clients WHERE nom LIKE '%$nom%' AND adresse LIKE '%$adresse%' AND telephone LIKE '%$telephone%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_client"]. " - Nom: " . $row["nom"]. " - Adresse: " . $row["adresse"]. " - Téléphone: " . $row["telephone"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>

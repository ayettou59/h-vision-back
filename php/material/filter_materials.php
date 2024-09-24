<form action="filter_materials.php" method="get">
    <select name="categorie" required>
        <option value="son">Son</option>
        <option value="lumière">Lumière</option>
        <option value="technique">Technique</option>
    </select>
    <button type="submit">Filtrer</button>
</form>
<?php
include 'config.php';

$categorie = $_GET['categorie'];

$sql = "SELECT * FROM Matériels WHERE categorie='$categorie'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_materiel"]. " - Nom: " . $row["nom"]. " - Catégorie: " . $row["categorie"]. " - Quantité: " . $row["quantite"]. "<br>";
    }
} else {
    echo "0 résultats";
}
?>

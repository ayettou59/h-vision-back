<form action="create_material.php" method="post">
    <input type="text" name="nom" placeholder="Nom du matériel" required>
    <select name="categorie" required>
        <option value="son">Son</option>
        <option value="lumière">Lumière</option>
        <option value="technique">Technique</option>
    </select>
    <input type="number" name="quantite" placeholder="Quantité" required>
    <button type="submit">Créer</button>
</form>
<?php
include '../user/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];

    $sql = "INSERT INTO Matériels (nom, categorie, quantite) VALUES ('$nom', '$categorie', '$quantite')";
    if (mysqli_query($conn, $sql)) {
        echo "Matériel créé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<form action="update_material.php" method="post">
    <input type="hidden" name="id_materiel" value="<?php echo $_GET['id_materiel']; ?>">
    <input type="text" name="nom" placeholder="Nom du matériel" required>
    <select name="categorie" required>
        <option value="son">Son</option>
        <option value="lumière">Lumière</option>
        <option value="technique">Technique</option>
    </select>
    <input type="number" name="quantite" placeholder="Quantité" required>
    <button type="submit">Mettre à jour</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_materiel = $_POST['id_materiel'];
    $nom = $_POST['nom'];
    $categorie = $_POST['categorie'];
    $quantite = $_POST['quantite'];

    $sql = "UPDATE Matériels SET nom='$nom', categorie='$categorie', quantite='$quantite' WHERE id_materiel='$id_materiel'";
    if (mysqli_query($conn, $sql)) {
        echo "Matériel mis à jour avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

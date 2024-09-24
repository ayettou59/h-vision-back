<form action="update_team.php" method="post">
    <input type="hidden" name="id_equipe" value="<?php echo $_GET['id_equipe']; ?>">
    <input type="text" name="nom" placeholder="Nom de l'équipe" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit">Mettre à jour</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipe = $_POST['id_equipe'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $sql = "UPDATE Équipes SET nom='$nom', description='$description' WHERE id_equipe='$id_equipe'";
    if (mysqli_query($conn, $sql)) {
        echo "Équipe mise à jour avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

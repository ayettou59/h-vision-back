<form action="delete_material.php" method="post">
    <input type="hidden" name="id_materiel" value="<?php echo $_GET['id_materiel']; ?>">
    <button type="submit">Supprimer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_materiel = $_POST['id_materiel'];

    $sql = "DELETE FROM Matériels WHERE id_materiel='$id_materiel'";
    if (mysqli_query($conn, $sql)) {
        echo "Matériel supprimé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

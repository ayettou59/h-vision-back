<form action="delete_team.php" method="post">
    <input type="hidden" name="id_equipe" value="<?php echo $_GET['id_equipe']; ?>">
    <button type="submit">Supprimer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipe = $_POST['id_equipe'];

    $sql = "DELETE FROM Équipes WHERE id_equipe='$id_equipe'";
    if (mysqli_query($conn, $sql)) {
        echo "Équipe supprimée avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

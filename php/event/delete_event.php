<form action="delete_event.php" method="post">
    <input type="hidden" name="id_evenement" value="<?php echo $_GET['id_evenement']; ?>">
    <button type="submit">Supprimer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_evenement = $_POST['id_evenement'];

    $sql = "DELETE FROM Événements WHERE id_evenement='$id_evenement'";
    if (mysqli_query($conn, $sql)) {
        echo "Événement supprimé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

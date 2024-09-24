<form action="delete_client.php" method="post">
    <input type="hidden" name="id_client" value="<?php echo $_GET['id_client']; ?>">
    <button type="submit">Supprimer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_client = $_POST['id_client'];

    $sql = "DELETE FROM Clients WHERE id_client='$id_client'";
    if (mysqli_query($conn, $sql)) {
        echo "Client supprimé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

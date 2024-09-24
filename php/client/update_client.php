<form action="update_client.php" method="post">
    <input type="hidden" name="id_client" value="<?php echo $_GET['id_client']; ?>">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <input type="text" name="telephone" placeholder="Téléphone" required>
    <button type="submit">Mettre à jour</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_client = $_POST['id_client'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    $sql = "UPDATE Clients SET nom='$nom', adresse='$adresse', telephone='$telephone' WHERE id_client='$id_client'";
    if (mysqli_query($conn, $sql)) {
        echo "Client mis à jour avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

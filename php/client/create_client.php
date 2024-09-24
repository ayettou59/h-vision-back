<form action="create_client.php" method="post">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <input type="text" name="telephone" placeholder="Téléphone" required>
    <button type="submit">Créer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    $sql = "INSERT INTO Clients (nom, adresse, telephone) VALUES ('$nom', '$adresse', '$telephone')";
    if (mysqli_query($conn, $sql)) {
        echo "Client créé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<form action="create_team.php" method="post">
    <input type="text" name="nom" placeholder="Nom de l'équipe" required>
    <input type="text" name="description" placeholder="Description" required>
    <button type="submit">Créer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $sql = "INSERT INTO Équipes (nom, description) VALUES ('$nom', '$description')";
    if (mysqli_query($conn, $sql)) {
        echo "Équipe créée avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

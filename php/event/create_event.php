<form action="create_event.php" method="post">
    <input type="text" name="nom" placeholder="Nom de l'événement" required>
    <input type="date" name="date" placeholder="Date" required>
    <input type="text" name="lieu" placeholder="Lieu" required>
    <select name="id_client" required>
        <!-- Options des clients -->
    </select>
    <select name="id_equipe" required>
        <!-- Options des équipes -->
    </select>
    <button type="submit">Créer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $id_client = $_POST['id_client'];
    $id_equipe = $_POST['id_equipe'];

    $sql = "INSERT INTO Événements (nom, date, lieu, id_client, id_equipe) VALUES ('$nom', '$date', '$lieu', '$id_client', '$id_equipe')";
    if (mysqli_query($conn, $sql)) {
        echo "Événement créé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

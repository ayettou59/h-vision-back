<form action="update_event.php" method="post">
    <input type="hidden" name="id_evenement" value="<?php echo $_GET['id_evenement']; ?>">
    <input type="text" name="nom" placeholder="Nom de l'événement" required>
    <input type="date" name="date" placeholder="Date" required>
    <input type="text" name="lieu" placeholder="Lieu" required>
    <select name="id_client" required>
        <!-- Options des clients -->
    </select>
    <select name="id_equipe" required>
        <!-- Options des équipes -->
    </select>
    <button type="submit">Mettre à jour</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_evenement = $_POST['id_evenement'];
    $nom = $_POST['nom'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];
    $id_client = $_POST['id_client'];
    $id_equipe = $_POST['id_equipe'];

    $sql = "UPDATE Événements SET nom='$nom', date='$date', lieu='$lieu', id_client='$id_client', id_equipe='$id_equipe' WHERE id_evenement='$id_evenement'";
    if (mysqli_query($conn, $sql)) {
        echo "Événement mis à jour avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

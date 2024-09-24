<form action="associate_material.php" method="post">
    <input type="hidden" name="id_evenement" value="<?php echo $_GET['id_evenement']; ?>">
    <select name="id_materiel" required>
        <!-- Options des matériels -->
    </select>
    <button type="submit">Associer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_evenement = $_POST['id_evenement'];
    $id_materiel = $_POST['id_materiel'];

    $sql = "INSERT INTO Événements_Matériels (id_evenement, id_materiel) VALUES ('$id_evenement', '$id_materiel')";
    if (mysqli_query($conn, $sql)) {
        echo "Matériel associé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

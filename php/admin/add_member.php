<form action="add_member.php" method="post">
    <input type="hidden" name="id_equipe" value="<?php echo $_GET['id_equipe']; ?>">
    <input type="text" name="id_utilisateur" placeholder="ID de l'utilisateur" required>
    <button type="submit">Ajouter</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipe = $_POST['id_equipe'];
    $id_utilisateur = $_POST['id_utilisateur'];

    $sql = "INSERT INTO Équipe_Utilisateurs (id_equipe, id_utilisateur) VALUES ('$id_equipe', '$id_utilisateur')";
    if (mysqli_query($conn, $sql)) {
        echo "Membre ajouté avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

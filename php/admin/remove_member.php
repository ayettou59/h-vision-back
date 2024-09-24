<form action="remove_member.php" method="post">
    <input type="hidden" name="id_equipe" value="<?php echo $_GET['id_equipe']; ?>">
    <input type="text" name="id_utilisateur" placeholder="ID de l'utilisateur" required>
    <button type="submit">Supprimer</button>
</form>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_equipe = $_POST['id_equipe'];
    $id_utilisateur = $_POST['id_utilisateur'];

    $sql = "DELETE FROM Équipe_Utilisateurs WHERE id_equipe='$id_equipe' AND id_utilisateur='$id_utilisateur'";
    if (mysqli_query($conn, $sql)) {
        echo "Membre supprimé avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

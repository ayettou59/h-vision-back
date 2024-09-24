<form action="edit_user.php" method="post">
    <input type="text" name="username" placeholder="Nouveau nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Nouvel email" required>
    <button type="submit">Mettre à jour</button>
</form>
<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE Utilisateurs SET nom='$username', email='$email' WHERE id_utilisateur='$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo "Informations mises à jour avec succès!";
    } else {
        echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

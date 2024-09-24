<form action="login.php" method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Se connecter</button>
</form>

<?php
session_start();
include 'config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors[] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    if (empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    }

    if (empty($errors)) {
        $sql = "SELECT * FROM Utilisateurs WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['mot_de_passe'])) {
            $_SESSION['user_id'] = $user['id_utilisateur'];
            $_SESSION['username'] = $user['nom'];
            header("Location: dashboard.php");
        } else {
            $errors[] = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<?php if (!empty($errors)): ?>
    <div class="errors">
        <?php foreach ($errors as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

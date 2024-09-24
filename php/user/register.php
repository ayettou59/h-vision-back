<form action="register.php" method="post">
    <label for="username">Nom d'utilisateur:</label>
    <input type="text" id="username" name="username" placeholder="Nom d'utilisateur" required>
    <br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email" required>
    <br><br>
    <label for="password">Mot de passe:</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" required>
    <br><br>
    <label for="confirm_password">Confirmer mot de passe:</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer mot de passe" required>
    <br><br>
    <button type="submit">S'inscrire</button>
</form>


<?php
session_start();
include 'config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if (empty($username)) {
        $errors[] = "Le nom d'utilisateur est requis.";
    }

    if (empty($email)) {
        $errors[] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    if (empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if (empty($errors)) {
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO Utilisateurs (nom, email, mot_de_passe) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $password_hashed);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['success'] = "Compte créé avec succès!";
            header("Location: login.php");
            exit;
        } else {
            $errors[] = "Erreur: " . mysqli_error($conn);
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

<?php if (isset($_SESSION['success'])): ?>
    <div class="success">
        <p><?php echo $_SESSION['success']; ?></p>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

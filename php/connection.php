<?php
session_start();
require 'Tp_php_mai_2024\config\bootstrap.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Préparer la requête SQL pour trouver l'utilisateur par son email
    $sql = "SELECT id, password FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie
        $_SESSION['user_id'] = $user['id'];
        echo "Connexion réussie. Bienvenue!";
    } else {
        echo "Identifiants incorrects. <a href='public\Connection.html'>Essayez de nouveau</a>";
    }
} else {
    // Rediriger vers la page de connexion si la méthode n'est pas POST
    header("Location: /Tp_php_mai_2024/public/Connection.html");

    exit();
}
?>

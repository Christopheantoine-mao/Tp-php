<?php
require 'C:\laragon\www\Tp_php_mai_2024\config\bootstrap.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    try {
        // Recherche de l'utilisateur par email
        $sql = "SELECT id, password FROM users WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie
            session_start();
            $_SESSION['user_id'] = $user['id'];

            // Enregistrement de l'activité de connexion
            $activitySql = "INSERT INTO user_activities (user_id, action_type, action_time) VALUES (?, 'connexion', NOW())";
            $activityStmt = $pdo->prepare($activitySql);
            $activityStmt->execute([$user['id']]);

            echo "Connexion réussie. Bienvenue!";
        } else {
            echo "Identifiants incorrects. <a href='login.html'>Essayez de nouveau</a>";
        }
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion: " . $e->getMessage();
    }
} else {
    header("Location: login.html");
    exit;
}
?>
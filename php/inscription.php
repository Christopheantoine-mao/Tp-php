<?php
require 'Tp_php_mai_2024\config\bootstrap.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $dob = htmlspecialchars(trim($_POST['dob']));  // Assurez-vous que cette donnée est envoyée par le formulaire
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO users (firstname, lastname, dob, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$firstname, $lastname, $dob, $email, $hashed_password]);

        echo "Inscription réussie. <a href='login.html'>Connectez-vous ici</a>";
    } catch (PDOException $e) {
        echo "Erreur lors de l'inscription: " . $e->getMessage();
    }
} else {
    header("Location: Tp_php_mai_2024\php\submit_inscription.php");
    exit;
}
?>
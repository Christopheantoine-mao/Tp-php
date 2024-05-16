<?php



$host = 'localhost';
$dbname = 'tp_php';
$user = 'root';
$pass = '';
$pdo = new PDO("mysql:localhost=$host;tp_php=$dbname", $user, $pass);

if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'])) {
    // Exemple de hachage de mot de passe
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Exemple de requête d'insertion
    $query = "INSERT INTO user (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_POST['firstname'], $_POST['lastname'], $_POST['email'], $password]);
}



?>

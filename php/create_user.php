<?php
require_once __DIR__ . 'C:\laragon\www\Tp_php_mai_2024\config\bootstrap.php';

// Assurez-vous d'utiliser le bon namespace si Entity n'est pas dans la racine du namespace
$user = new Entity\User();
$user->setFirstname('John');

// Récupération de l'EntityManager via le bootstrap
$entityManager = require_once __DIR__ . '/../config/bootstrap.php';

$entityManager->persist($user);
$entityManager->flush();

echo "User created with ID " . $user->getId();
?>
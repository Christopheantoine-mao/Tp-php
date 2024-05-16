<?php
require_once __DIR__ . '/../config/bootstrap.php';


// Assurez-vous que le chemin est correct et que vous avez inclus le fichier bootstrap une seule fois
$entityManager = require 'config/bootstrap.php';

// Récupération des données du formulaire
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);

// Création de la nouvelle entité User
$user = new Entity\User();
$user->setFirstname($firstname);
$user->setLastname($lastname);

// Persister l'entité dans la base de données
$entityManager->persist($user);
$entityManager->flush();

echo "User created with ID " . $user->getId();

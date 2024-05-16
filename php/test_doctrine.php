<?php
// fichier test_doctrine.php
require_once 'C:\laragon\www\Tp_php_mai_2024\public\src\entity\config.php\bootstrap.php';  // Ajustez le chemin vers votre fichier de configuration

if ($entityManager) {
    echo "Doctrine EntityManager est correctement configuré et chargé.";
} else {
    echo "Erreur lors du chargement de Doctrine EntityManager.";
}
?>
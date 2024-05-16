<?php
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';

$paths = [__DIR__ . '/../src/Entity'];
$isDevMode = true;

// Crée un cache pour stocker les métadonnées d'annotation
$reader = new \Doctrine\Common\Annotations\CachedReader(new \Doctrine\Common\Cache\FilesystemCache('/tmp'), new \Doctrine\Common\Annotations\AnnotationReader());


$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'tp_php',
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false, $reader);
$entityManager = EntityManager::create($dbParams, $config);
return $entityManager;

<?php
include __DIR__ . '/php/Rss.Reader.php'; // Assurez-vous que le chemin vers le fichier est correct

// Activer l'affichage des erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    // Instance de la classe RSSReader pour France Info
    $franceinfoReader = new RSSReader(__DIR__ . '/../data/franceinfo.json');
    $franceinfoItems = $franceinfoReader->getItems();

    // Instance de la classe RSSReader pour Le Monde
    $lemondeReader = new RSSReader(__DIR__ . '/../data/lemonde.json');
    $lemondeItems = $lemondeReader->getItems();
} catch (Exception $e) {
    die("Erreur: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Actualités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/public/inscription.html">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/public/Connection.html">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/php/news.php">Actualités</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<div class="container">
    <h1>Actualités de France Info</h1>
    <div class="row">
        <?php foreach ($franceinfoItems as $article): ?>
            <div class='col-md-4'>
                <div class='card' style='margin-bottom: 20px;'>
                    <div class='card-body'>
                        <h5 class='card-title'><?= htmlspecialchars($article['title']) ?></h5>
                        <p class='card-text'><?= nl2br(htmlspecialchars($article['description'])) ?></p>
                        <p class='card-text'><small class='text-muted'>Publié le <?= htmlspecialchars($article['pubDate']) ?></small></p>
                        <a href='<?= htmlspecialchars($article['link']) ?>' class='btn btn-primary'>Lire plus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h1>Actualités du Monde</h1>
    <div class="row">
        <?php foreach ($lemondeItems as $article): ?>
            <div class='col-md-4'>
                <div class='card' style='margin-bottom: 20px;'>
                    <div class='card-body'>
                        <h5 class='card-title'><?= htmlspecialchars($article['title']) ?></h5>
                        <p class='card-text'><?= nl2br(htmlspecialchars($article['description'])) ?></p>
                        <p class='card-text'><small class='text-muted'>Par <?= htmlspecialchars($article['author']) ?> le <?= htmlspecialchars($article['pubDate']) ?></small></p>
                        <a href='<?= htmlspecialchars($article['link']) ?>' class='btn btn-primary'>Lire plus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>


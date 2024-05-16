<?php

require_once 'C:\laragon\www\Tp_php_mai_2024\config\bootstrap.php'; // Assurez-vous que le chemin est correct

function insertArticles($filePath, $tableName, $pdo) {
    $jsonData = file_get_contents($filePath);
    if ($jsonData === false) {
        throw new Exception("Cannot load file: " . $filePath);
    }

    $articles = json_decode($jsonData, true);
    if ($articles === null) {
        throw new Exception("Error decoding JSON: " . json_last_error_msg());
    }

    $query = $pdo->prepare("INSERT INTO $tableName (title, description, pubDate, link) VALUES (:title, :description, :pubDate, :link)");

    foreach ($articles as $article) {
        $query->execute([
            ':title' => $article['title'],
            ':description' => $article['description'],
            ':pubDate' => $article['pubDate'],
            ':link' => $article['link']
        ]);
    }
}

// Insert France Info articles
try {
    insertArticles('path/to/franceinfo.json', 'franceinfo_articles', $pdo);
    insertArticles('path/to/lemonde.json', 'lemonde_articles', $pdo);
    echo "Articles inserted successfully.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
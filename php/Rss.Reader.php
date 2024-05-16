<?php
class RSSReader {
    private $filePath;
    private $data;

    public function __construct($filePath) {
        $this->filePath = $filePath;
        $this->loadData();
    }

    private function loadData() {
        $fileContents = file_get_contents($this->filePath);
        if ($fileContents === false) {
            throw new Exception("Erreur de chargement du fichier à " . $this->filePath);
        }
        $this->data = json_decode($fileContents, true);
        if ($this->data === null) {
            throw new Exception("Erreur de décodage du JSON: " . json_last_error_msg());
        }
    }

    public function getItems() {
        if (isset($this->data['rss']['channel']['items'])) {
            return $this->data['rss']['channel']['items'];
        } else {
            throw new Exception("Les articles ne sont pas disponibles dans le fichier.");
        }
    }
}
?>

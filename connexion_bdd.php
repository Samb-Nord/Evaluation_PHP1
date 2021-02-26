<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=wf3_php_intermediaire_samira;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

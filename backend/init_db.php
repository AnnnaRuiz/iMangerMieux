<?php
try {
    require_once('init_pdo.php');

    // Chemin du fichier SQL
    $sqlFile = 'sql/bd_iMM.sql';

    // Lire le contenu du fichier SQL
    $sqlContent = file_get_contents($sqlFile);

    // Exécuter les requêtes SQL
    $pdo->exec($sqlContent);

    echo "Le fichier $sqlFile a été exécuté avec succès.";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>



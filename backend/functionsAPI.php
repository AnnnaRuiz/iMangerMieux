<?php
require_once('init_pdo.php');

function getAllFood(){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare("SELECT * FROM ALIMENTS");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } else {
        return null; // Gestion de l'erreur de connexion à la base de données
    }
}

function createFoodItem($name, $categorie, $calories, $lipides, $glucides, $proteines, $sucre) {
    global $pdo;
    $request = $pdo->prepare('INSERT INTO `ALIMENTS` (`ALIMENT`, `LIPIDES`, `GLUCIDES`, `PROTEINES`, `CALORIES`, `CATEGORIE`, `SUCRE`) VALUES (:name, :lipides, :glucides, :proteines, :calories, :categorie, :sucre);');
    $request->bindParam(':name', $name, PDO::PARAM_STR);
    $request->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $request->bindParam(':calories', $calories, PDO::PARAM_STR);
    $request->bindParam(':lipides', $lipides, PDO::PARAM_STR);
    $request->bindParam(':glucides', $glucides, PDO::PARAM_STR);
    $request->bindParam(':proteines', $proteines, PDO::PARAM_STR);
    $request->bindParam(':sucre', $sucre, PDO::PARAM_STR);
    $request->execute();

    return ['ALIMENT' => $pdo->lastInsertId()];
}
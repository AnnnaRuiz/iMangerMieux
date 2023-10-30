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

    return ['ALIMENT' => $name];
}

function deleteFoodItem($nom) {
    global $pdo;
    $request = $pdo->prepare('DELETE FROM `ALIMENTS` WHERE `ALIMENT`= :nom');
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->execute();

    return $request->rowCount() > 0; // Renvoie true si au moins une ligne a été supprimée, sinon false
}
function updateFoodItem($nom, $categorie, $calories, $lipides, $glucides, $proteines, $sucre) {
    global $pdo;
    
    $request = $pdo->prepare('UPDATE `ALIMENTS` SET `CALORIES` = :calories, `CATEGORIE` = :categorie, `LIPIDES` = :lipides, `GLUCIDES` = :glucides, `PROTEINES` = :proteines, `SUCRE` = :sucre WHERE `ALIMENTS`.`ALIMENT` = :nom'); 
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    $request->bindParam(':calories', $calories, PDO::PARAM_STR);
    $request->bindParam(':lipides', $lipides, PDO::PARAM_STR);
    $request->bindParam(':glucides', $glucides, PDO::PARAM_STR);
    $request->bindParam(':proteines', $proteines, PDO::PARAM_STR);
    $request->bindParam(':sucre', $sucre, PDO::PARAM_STR);
    $request->execute();

    return $request->rowCount() > 0 ? ["CATEGORIE" => $categorie, "CALORIES" => $calories, "LIPIDES" => $lipides, "GLUCIDES" => $glucides, "PROTEINES" => $proteines, "SUCRE" => $sucre] : null; // Renvoie les données mises à jour ou null si aucune ligne mise à jour

}

function get_user($email, $pwd){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare("SELECT * FROM `USERS` WHERE MAIL=:email AND MDP=:pwd");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } else {
        return null; // Gestion de l'erreur de connexion à la base de données
    }
}
function createUser($name, $mail, $pwd, $taille, $poids, $sexe, $age, $activite){
    global $pdo;
    $request = $pdo->prepare('INSERT INTO `users` (`NOM`, `MAIL`, `MDP`, `SEXE`, `AGE`, `POIDS`, `TAILLE`, `ACTIVITE`) VALUES (:name, :mail, :pwd, :sexe, :age, :poids, :taille, :activite);');
    $request->bindParam(':name', $name, PDO::PARAM_STR);
    $request->bindParam(':mail', $mail, PDO::PARAM_STR);
    $request->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $request->bindParam(':sexe', $sexe, PDO::PARAM_STR);
    $request->bindParam(':age', $age, PDO::PARAM_STR);
    $request->bindParam(':poids', $poids, PDO::PARAM_STR);
    $request->bindParam(':taille', $taille, PDO::PARAM_STR);
    $request->bindParam(':activite', $activite, PDO::PARAM_STR);
    $request->execute();

    return ['mail' => $mail];
}
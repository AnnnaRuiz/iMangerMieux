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

function getUser($email, $pwd){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare("SELECT * FROM `USERS` WHERE MAIL=:email AND MDP=:pwd");
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->bindParam(':pwd', $pwd, PDO::PARAM_STR);
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

function getDailyRepas($email){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare("
        SELECT t1.REPAS_ID, t2.DATE, t2.TYPE_REPAS, t1.ALIMENT, t1.QUANTITE
            FROM REPASALIMENT AS t1
            JOIN REPAS AS t2 ON t1.REPAS_ID = t2.REPAS_ID
            WHERE t2.MAIL = :email
            ORDER BY DATE ASC;
        ");
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    } 
    else {
        return null; // Gestion de l'erreur de connexion à la base de données
    }
}

function createAlimentRepas($mail, $date, $type_repas, $aliment, $quantite){
    global $pdo;
    $request = $pdo->prepare('
        INSERT INTO REPAS (MAIL, DATE, TYPE_REPAS)
        SELECT :mail, :date, :type_repas
        FROM DUAL
        WHERE NOT EXISTS (
            SELECT 1
            FROM REPAS
            WHERE MAIL = :mail AND DATE = :date AND TYPE_REPAS = :type_repas
        );
        INSERT INTO REPASALIMENT (REPAS_ID, ALIMENT, QUANTITE)
        SELECT REPAS_ID, :aliment, :quantite
        FROM REPAS
        WHERE MAIL = :mail AND DATE = :date AND TYPE_REPAS = :type_repas;
    ');
    $request->bindParam(':mail', $mail, PDO::PARAM_STR);
    $request->bindParam(':date', $date, PDO::PARAM_STR);
    $request->bindParam(':type_repas', $type_repas, PDO::PARAM_STR);
    $request->bindParam(':aliment', $aliment, PDO::PARAM_STR);
    $request->bindParam(':quantite', $quantite, PDO::PARAM_STR);
    $request->execute();

    return ['ALIMENT' => $aliment];
}

 function deleteRepas($id, $aliment){
    global $pdo;
    $request = $pdo->prepare('DELETE FROM `REPASALIMENT` WHERE `REPAS_ID`=:id AND `ALIMENT`=:aliment;');
    $request->bindParam(':id', $id, PDO::PARAM_STR);
    $request->bindParam(':aliment', $aliment, PDO::PARAM_STR);
    $request->execute();

    return ['REPAS_ID' => $id];
 }

 function updateRepasItem($repas_id, $aliment, $quantite){
    global $pdo;
    $request = $pdo->prepare('
        UPDATE `REPASALIMENT` SET `QUANTITE` = :quantite 
        WHERE `REPAS_ID` = :repas_id AND `ALIMENT` = :aliment;
    ');
    $request->bindParam(':quantite', $quantite, PDO::PARAM_STR);
    $request->bindParam(':repas_id', $repas_id, PDO::PARAM_STR);
    $request->bindParam(':aliment', $aliment, PDO::PARAM_STR);
    $request->execute();

    return ['REPAS_ID' => $repas_id];
 }
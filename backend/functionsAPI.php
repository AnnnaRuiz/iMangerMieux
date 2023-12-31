<?php
require_once('init_pdo.php');

//pour aliment.php :

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

//pour users.php :

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

    $sql = "SELECT COUNT(*) FROM users WHERE mail = :mail";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mail' => $mail]);
    $row = $stmt->fetchColumn();

    if ($row > 0) {
        return false;
    } else {
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
    }
    return ['mail' => $mail];
}

function updateUserConnexionData($mail, $nom, $pwd){
    global $pdo;
    
    $request = $pdo->prepare('UPDATE `USERS` SET `NOM` = :nom, `MDP` = :pwd WHERE `USERS`.`MAIL` = :mail;'); 
    $request->bindParam(':nom', $nom, PDO::PARAM_STR);
    $request->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $request->bindParam(':mail', $mail, PDO::PARAM_STR);
    $request->execute();

    return $request->rowCount() > 0 ? ["MAIL" => $mail, "NOM" => $nom, "MDP" => $pwd] : null; // Renvoie les données mises à jour ou null si aucune ligne mise à jour

}

function updateUserPersonalData($mail, $sexe, $age, $poids, $taille, $activite){
    global $pdo;
    
    $request = $pdo->prepare('UPDATE `USERS` SET `SEXE` = :sexe, `AGE` = :age, `POIDS` = :poids, `TAILLE` = :taille, `ACTIVITE` = :activite WHERE `USERS`.`MAIL` = :mail;'); 
    $request->bindParam(':sexe', $sexe, PDO::PARAM_STR);
    $request->bindParam(':age', $age, PDO::PARAM_STR);
    $request->bindParam(':poids', $poids, PDO::PARAM_STR);
    $request->bindParam(':taille', $taille, PDO::PARAM_STR);
    $request->bindParam(':activite', $activite, PDO::PARAM_STR);
    $request->bindParam(':mail', $mail, PDO::PARAM_STR);
    $request->execute();

    return $request->rowCount() > 0 ? ["MAIL" => $mail, "AGE" => $age, "TAILLE" => $taille, "POIDS" => $poids, "ACTIVITE" => $activite, "SEXE" => $sexe] : null; // Renvoie les données mises à jour ou null si aucune ligne mise à jour

}

//pour repas.php :

function getDailyRepas($email){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare("
        SELECT t1.REPAS_ID, t2.DATE, t2.TYPE_REPAS, t1.ALIMENT, t1.QUANTITE
            FROM REPASALIMENT AS t1
            JOIN REPAS AS t2 ON t1.REPAS_ID = t2.REPAS_ID
            WHERE t2.MAIL = :email
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

function listAlimentRepas(){
    global $pdo;
    $request = $pdo->prepare("
    SELECT ALIMENT FROM ALIMENTS;
    ");
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_OBJ);
    return $result;
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

    return $request->rowCount() > 0 ? ["REPAS_ID" => $repas_id, "ALIMENT" => $aliment, "QUANTITE" => $quantite] : null;

}

//pour journal.php :

function extractDailyDatas ($mail, $date){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare('
            SELECT ROUND(SUM(a.calories * ra.quantite / 100), 2) AS total_daily_calories,
            ROUND(SUM(a.lipides * ra.quantite / 100), 2) AS total_daily_lipides,
            ROUND(SUM(a.glucides * ra.quantite / 100), 2) AS total_daily_glucides,
            ROUND(SUM(a.PROTEINES * ra.quantite / 100), 2) AS total_daily_proteines,
            ROUND(SUM(a.SUCRE * ra.quantite / 100), 2) AS total_daily_sucres
            FROM Repas r
            JOIN RepasAliment ra ON r.repas_id = ra.repas_id
            JOIN Aliments a ON ra.aliment = a.aliment
            WHERE r.DATE = :date AND r.MAIL = :mail;
        ');
        $request->bindParam(':date', $date, PDO::PARAM_STR);
        $request->bindParam(':mail', $mail, PDO::PARAM_STR);
        $request->execute();

        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    else {
        return null; // Gestion de l'erreur de connexion à la base de données
    }
}

function extractMonthlyDatas ($mail, $date){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare('
            SELECT ROUND(SUM(a.calories * ra.quantite / 100), 2) AS total_monthly_calories,
            ROUND(SUM(a.lipides * ra.quantite / 100), 2) AS total_monthly_lipides,
            ROUND(SUM(a.glucides * ra.quantite / 100), 2) AS total_monthly_glucides,
            ROUND(SUM(a.PROTEINES * ra.quantite / 100), 2) AS total_monthly_proteines,
            ROUND(SUM(a.SUCRE * ra.quantite / 100), 2) AS total_monthly_sucres,
            COUNT(DISTINCT DATE) AS total_monthly_data
            FROM Repas r
            JOIN RepasAliment ra ON r.repas_id = ra.repas_id
            JOIN Aliments a ON ra.aliment = a.aliment
            WHERE MONTH(r.DATE) = MONTH(:date) AND YEAR(r.DATE) = YEAR(:date) AND r.MAIL = :mail;
        ');
        $request->bindParam(':date', $date, PDO::PARAM_STR);
        $request->bindParam(':mail', $mail, PDO::PARAM_STR);
        $request->execute();

        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    else {
        return null; // Gestion de l'erreur de connexion à la base de données
    }
}

function extractWeeklyDatas ($mail, $date){
    global $pdo;
    if ($pdo !== null) {
        $request = $pdo->prepare('
            SELECT ROUND(SUM(a.calories * ra.quantite / 100), 2) AS total_weekly_calories,
            ROUND(SUM(a.lipides * ra.quantite / 100), 2) AS total_weekly_lipides,
            ROUND(SUM(a.glucides * ra.quantite / 100), 2) AS total_weekly_glucides,
            ROUND(SUM(a.PROTEINES * ra.quantite / 100), 2) AS total_weekly_proteines,
            ROUND(SUM(a.SUCRE * ra.quantite / 100), 2) AS total_weekly_sucres,
            COUNT(DISTINCT DATE) AS total_weekly_data
            FROM Repas r
            JOIN RepasAliment ra ON r.repas_id = ra.repas_id
            JOIN Aliments a ON ra.aliment = a.aliment
            WHERE WEEK(r.DATE) = WEEK(:date) AND r.MAIL = :mail;
        ');
        $request->bindParam(':date', $date, PDO::PARAM_STR);
        $request->bindParam(':mail', $mail, PDO::PARAM_STR);
        $request->execute();

        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    else {
        return null; // Gestion de l'erreur de connexion à la base de données
    }
}

//pour accueil.php :

function numberFruitsVegsThisDay($mail, $date){
    global $pdo;
    $request = $pdo->prepare('
    SELECT COUNT(a.ALIMENT) AS total_daily_fruitslegs
        FROM Aliments a
        JOIN RepasAliment ra ON ra.aliment = a.aliment
        JOIN Repas r ON r.repas_id = ra.repas_id
        WHERE r.DATE = :date AND r.MAIL = :mail AND a.CATEGORIE = "Fruits et légumes";
    ');
    $request->bindParam(':date', $date, PDO::PARAM_STR);
    $request->bindParam(':mail', $mail, PDO::PARAM_STR);
    $request->execute();

    $result = $request->fetchAll(PDO::FETCH_OBJ);
    return $result;
}

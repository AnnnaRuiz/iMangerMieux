<?php
require_once('init_db.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $result = getAllFood();
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));

    case 'POST':
        $name = $_POST['ALIMENT'];
        $category = $_POST['CATEGORIE'];
        $calories = $_POST['CALORIES'];
        $lipides = $_POST['LIPIDES'];
        $glucides = $_POST['GLUCIDES'];
        $proteines = $_POST['PROTEINES'];
        $sucre = $_POST['SUCRE'];
        $item = createFoodItem($name, $category, $calories, $lipides, $glucides, $proteines, $sucre);

        if ($item != null) {
            // Utilisateur créé avec succès
            http_response_code(201); // Code 201 created 
            header('Content-Type: application/json');
            exit(json_encode($item));
        } else {
            // Erreur lors de la création de l'utilisateur
            http_response_code(500); // Code d'erreur 500 Internal Server Error
            exit(json_encode(["message" => "Erreur lors de la création de l'utilisateur"]));
        }

    default: 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));



}
        

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

function createFoodItem($name, $category, $calories, $lipides, $glucides, $proteines, $sucre) {
    global $pdo;
    $request = $pdo->prepare('INSERT INTO `ALIMENTS` (`ID`, `ALIMENT`, `CATEGORIE`, `CALORIES`, `LIPIDES`, `GLUCIDES`, `PROTEINES`, `SUCRE`) VALUES (NULL, :name, :category, :calories, :lipides, :glucides, :proteines, :sucre)');
    $request->bindParam(':name', $name, PDO::PARAM_STR);
    $request->bindParam(':category', $category, PDO::PARAM_STR);
    $request->bindParam(':calories', $calories, PDO::PARAM_STR);
    $request->bindParam(':lipides', $lipides, PDO::PARAM_STR);
    $request->bindParam(':glucides', $glucides, PDO::PARAM_STR);
    $request->bindParam(':proteines', $proteines, PDO::PARAM_STR);
    $request->bindParam(':sucre', $sucre, PDO::PARAM_STR);
    $request->execute();

    return ['ID' => $pdo->lastInsertId()];
}
<?php
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $result = getAllFood();
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));

    case 'POST':
        $name = $_POST['ALIMENT'];
        $categorie = $_POST['CATEGORIE'];
        $calories = $_POST['CALORIES'];
        $lipides = $_POST['LIPIDES'];
        $glucides = $_POST['GLUCIDES'];
        $proteines = $_POST['PROTEINES'];
        $sucre = $_POST['SUCRE'];
        $item = createFoodItem($name, $categorie, $calories, $lipides, $glucides, $proteines, $sucre);

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
        


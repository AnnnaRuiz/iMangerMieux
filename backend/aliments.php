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
            // Aliment créé avec succès
            http_response_code(201); // Code 201 created 
            header('Content-Type: application/json');
            exit(json_encode($item));
        } else {
            // Erreur lors de la création de l'aliment
            http_response_code(500); // Code d'erreur 500 Internal Server Error
            exit(json_encode(["message" => "Erreur lors de la création de l'aliment"]));
        }
    
    case 'DELETE':
        parse_str(file_get_contents("php://input"), $deleteData);
    
        if(isset($deleteData['ALIMENT'])){
            $nom = $deleteData['ALIMENT'];
    
            $deleted = deleteFoodItem($nom);
    
            if ($deleted) {
                http_response_code(200); // Code 200 OK
                exit( json_encode(["message" => "Aliment supprime avec succes"]));
            } else {
                http_response_code(404); // Code d'erreur 404 Not Found 
                exit( json_encode(["message" => "Aliment non trouve"]));
            }
        } else {
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit( json_encode(["message" => "Parametres invalides pour la suppression de l'aliment"]));
        }

        case 'PUT':
            parse_str(file_get_contents("php://input"), $putData);
    
            if(isset($putData['ALIMENT']) && isset($putData['CALORIES']) && isset($putData['CATEGORIE']) && isset($putData['GLUCIDES']) && isset($putData['LIPIDES']) && isset($putData['PROTEINES']) && isset($putData['SUCRE'])){
                $nom = $putData['ALIMENT'];
                $categorie = $putData['CATEGORIE'];
                $calories = $putData['CALORIES'];
                $lipides = $putData['LIPIDES'];
                $glucides = $putData['GLUCIDES'];
                $proteines = $putData['PROTEINES'];
                $sucre = $putData['SUCRE'];
    
                $updatedFoodItem = updateFoodItem($nom, $categorie, $calories, $lipides, $glucides, $proteines, $sucre);
    
                if ($updatedFoodItem !== null) {
                    http_response_code(200); // Code 200 OK
                    header('Content-Type: application/json');
                    exit(json_encode($updatedFoodItem));
                } else {
                    http_response_code(404); // Code d'erreur 404 Not Found
                    exit(json_encode(["message" => "Aliment non trouve"]));
                }
            } else {
                http_response_code(400); // Code d'erreur 400 Bad Request
                exit(json_encode(["message" => "Parametres invalides pour la mise a jour de l'aliment"]));
            }

    default: 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));

}
        


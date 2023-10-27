<?php
require_once('init_db.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $result = getAllFood();
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));

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
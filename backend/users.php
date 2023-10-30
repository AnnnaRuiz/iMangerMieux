<?php
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'GET':
        $result = getUser($email, $pwd);
        header('Content-type: application/json');
        http_response_code(200);
        exit(json_encode($result));

    case 'POST':
        $name = $_POST['NOM'];
        $mail = $_POST['MAIL'];
        $pwd = $_POST['MDP'];
        $taille = $_POST['TAILLE'];
        $poids = $_POST['POIDS'];
        $sexe = $_POST['SEXE'];
        $age = $_POST['AGE'];
        $activite = $_POST['ACTIVITE'];
        $user = createUser($name, $mail, $pwd, $taille, $poids, $sexe, $age, $activite);

        if ($user != null) {
            // Utilisateur créé avec succès
            http_response_code(201); // Code 201 created 
            header('Content-Type: application/json');
            exit(json_encode($user));
        } else {
            // Erreur lors de la création de l'utilisateur
            http_response_code(500); // Code d'erreur 500 Internal Server Error
            exit(json_encode(["message" => "Erreur lors de la création de l'utilisateur"]));
        }
    }
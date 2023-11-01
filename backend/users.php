<?php
require_once('functionsAPI.php');

switch($_SERVER["REQUEST_METHOD"]){
    case 'POST':
        if(isset($_POST['NOM']) && isset($_POST['MAIL']) && isset($_POST['MDP']) && isset($_POST['TAILLE']) && isset($_POST['POIDS']) && isset($_POST['SEXE']) && isset($_POST['AGE']) && isset($_POST['ACTIVITE'])) {
            $name = $_POST['NOM'];
            $mail = $_POST['MAIL'];
            $pwd = $_POST['MDP'];
            $taille = $_POST['TAILLE'];
            $poids = $_POST['POIDS'];
            $sexe = $_POST['SEXE'];
            $age = $_POST['AGE'];
            $activite = $_POST['ACTIVITE'];
            $user = createUser($name, $mail, $pwd, $taille, $poids, $sexe, $age, $activite);

            if ($user) {
                // Utilisateur créé avec succès
                http_response_code(201); // Code 201 created 
                header('Content-Type: application/json');
                exit(json_encode($user));
            } else {
                // Erreur lors de la création de l'utilisateur
                http_response_code(500); // Code d'erreur 500 Internal Server Error
                exit(json_encode(["message" => "Erreur lors de la création de l'utilisateur"]));
            }
        } elseif(isset($_POST['email']) && isset($_POST['pwd'])) {
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            
            $user = getUser($email, $pwd);

            // header('Content-type: application/json');
            // http_response_code(200);
            // exit(json_encode($result));
            if($user!=null){
                // L'authentification a réussi
                session_start();
                $_SESSION['mail'] = $email;
                $_SESSION['mdp'] = $pwd;
                //corriger le code ci dessous pour initialiser les varibles de session
                // $_SESSION['nom'] = $user[0]['NOM'];
                // $_SESSION['sexe'] = $user[0]['SEXE'];
                // $_SESSION['age'] = $user[0]['AGE'];
                // $_SESSION['poids'] = $user[0]['POIDS'];
                // $_SESSION['taille'] = $user[0]['TAILLE'];
                // $_SESSION['activite'] = $user[0]['ACTIVITE'];
                http_response_code(200);
                exit(json_encode(["message" => "Success", "user" => $user]));
            }else{
                http_response_code(404);
                exit(json_encode(["message" => "Utilisateur non trouvé"]));
            }
        } else {
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit(json_encode(["message" => "Paramètres manquants pour la connexion"]));
        }
       
}

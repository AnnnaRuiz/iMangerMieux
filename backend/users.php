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
            
            $result = getUser($email, $pwd);
            
            if($result!=null){
                // L'authentification a réussi
                $user = $result[0]; 
                session_start();
                $_SESSION['mail'] = $email;
                $_SESSION['mdp'] = $pwd;
                $_SESSION['nom'] = $user->NOM;
                $_SESSION['sexe'] = $user->SEXE;
                $_SESSION['age'] = $user->AGE;
                $_SESSION['poids'] = $user->POIDS;
                $_SESSION['taille'] = $user->TAILLE;
                $_SESSION['activite'] = $user->ACTIVITE;

                // header('Content-type: application/json');
                http_response_code(200);
                exit(json_encode($result));
            } else {
                http_response_code(404);
                exit(json_encode(["message" => "Utilisateur non trouvé"]));
            }
        } else {
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit(json_encode(["message" => "Paramètres manquants pour la connexion"]));
        }
    case 'PUT':
        parse_str(file_get_contents("php://input"), $putData);
        session_start();
        if (isset($_SESSION['mail'])) {
            $mail = $_SESSION['mail'];
        }

        if(isset($putData['NOM']) && isset($putData['MDP'])){
            $_SESSION['nom'] = $putData['NOM'];
            $_SESSION['mdp'] = $putData['MDP'];
            
            $updatedUserCoData = updateUserConnexionData($mail, $putData['NOM'], $putData['MDP']);
    
            http_response_code(200); // Code 200 OK
            header('Content-Type: application/json');
            exit(json_encode($updatedUserCoData));

        } elseif(isset($putData['SEXE']) && isset($putData['AGE']) && isset($putData['POIDS']) && isset($putData['TAILLE']) && isset($putData['ACTIVITE'])){
            $_SESSION['sexe'] = $putData['SEXE'];
            $_SESSION['age'] = $putData['AGE'];
            $_SESSION['poids'] = $putData['POIDS'];
            $_SESSION['taille'] = $putData['TAILLE'];
            $_SESSION['activite'] = $putData['ACTIVITE'];

            $updatedUserCo = updateUserPersonalData($mail, $putData['SEXE'], $putData['AGE'], $putData['POIDS'], $putData['TAILLE'], $putData['ACTIVITE']);
            http_response_code(200); // Code 200 OK
            header('Content-Type: application/json');
            exit(json_encode($updatedUserCo));
            
        } else {
            http_response_code(400); // Code d'erreur 400 Bad Request
            exit(json_encode(["message" => "Parametres invalides pour la mise a jour des données de l'utilisateur"]));
        }

    default: 
        http_response_code(501);
        exit(json_encode(["message" => "Not implemented"]));
       
}

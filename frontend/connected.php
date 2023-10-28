<?php

    // on simule une base de données
    $users = array(
        // login => password
        'riri@mail' => 'fifi',
        'maitre@jedi' => 'luke');

    $errorText = "";
    $successfullyLogged = false;

    if(isset($_POST['login']) && isset($_POST['password'])) {
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
    // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
            session_start();
            $_SESSION['login']=$login;

        } else {
             $errorText = "Erreur de login/password";
        } 
        header('Location: index.php');
    }
    else {
        $errorText = "Merci d'utiliser le formulaire de login";
    }
    if($successfullyLogged) {
        
        // ecrire ici --> TO DO 
        echo "<h1>Bienvenue ".$login."</h1>";
        echo "<a href='deconnexion.php'>Se déconnecter </a>";
        
    } else {
        echo $errorText;
    }
?>
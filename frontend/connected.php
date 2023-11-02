<?php

    // on simule une base de données
    $users = array(
        //email => pwd
        'riri@mail' => 'fifi',
        'maitre@jedi' => 'luke'
    );

    $errorText = "";
    $successfullyLogged = false;

    if(isset($_POST['email']) && isset($_POST['pwd'])) {
        $tryLogin=$_POST['email'];
        $tryPwd=$_POST['pwd'];
    // si login existe et password correspondent
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
            session_start();
            $_SESSION['mail']=$login;
            $_SESSION['mdp'] = $pwd;

        } else {
             $errorText = "Erreur de login/password";
        } 
        header('Location: index.php');
    }
    else {
        $errorText = "Merci d'utiliser le formulaire de login";
    }
    if(!$successfullyLogged) {
        echo $errorText;
        
    } 
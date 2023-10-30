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
    // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            $login = $tryLogin;
            session_start();
            $_SESSION['email']=$login;

        } else {
             $errorText = "Erreur de login/password";
        } 
        header('Location: index.php');
    }
    else {
        $errorText = "Merci d'utiliser le formulaire de login";
    }
    if($successfullyLogged) {
        echo "<h1>Bienvenue ".$login."</h1>";
        echo "<a href='index.php?deconnexion'>Se déconnecter </a>";
        
    } else {
        echo $errorText;
    }
?>
<!DOCTYPE html>
<html>
<?php
    session_start();

    if(isset($_GET['deconnexion'])) {
        session_unset();
        session_destroy();
        unset($_GET['deconnexion']);
    }

    $login = "Anonymous";
    $is_connected = False;
    

    if(isset($_SESSION['mail'])) {
        $login = $_SESSION['mail'];
        $is_connected = True;
    }

    if(isset($_POST['email']) && isset($_POST['pwd'])) {
        $login = $_POST['email'];
        $pwd = $_POST['pwd'];
        $_SESSION['mail'] = $login;
        $_SESSION['mdp'] = $pwd;
        $is_connected = True;
    }
?>
<?php 
    require_once('template_header.php');
    require_once("template_menu.php");
?>

<body>
<?php

    $currentPageId = 'accueil';
    if(isset($_GET['page'])){
        $currentPageId=$_GET['page'];
    }

    renderMenuToHTML($currentPageId);
    if ($is_connected){
        echo '
            <div class="row">
                <div class="col-6 text-left">
                    <h5>Bienvenue '.$login.'</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="index.php?deconnexion">Déconnexion</a>
                </div>
            </div>';

        $pageToInclude = $currentPageId . ".php";

        if(is_readable($pageToInclude)){
            require_once($pageToInclude);
        }   
        else{
            require_once("error.php");
        }
    }
    else{
        require_once('login.php');
    }

?>

<?php require('template_footer.php') ?>

</body>


</html>
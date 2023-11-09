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

    if(isset($_SESSION['mdp']) && isset($_SESSION['nom']) && isset($_SESSION['taille']) && isset($_SESSION['sexe']) && isset($_SESSION['poids']) && isset($_SESSION['age']) && isset($_SESSION['activite'])) {
    $mdp = $_SESSION['mdp'];
    $nom = $_SESSION['nom'];
    $taille = $_SESSION['taille'];
    $sexe = $_SESSION['sexe'];
    $poids = $_SESSION['poids'];
    $age = $_SESSION['age'];
    $activite = $_SESSION['activite'];
    }

    if(isset($_POST['email']) && isset($_POST['pwd'])) {
        $login = $_POST['email'];
        $pwd = $_POST['pwd'];
        $_SESSION['mail'] = $login;
        $_SESSION['mdp'] = $pwd;
        $is_connected = True;
    }

    require_once('template_header.php');
    require_once("template_menu.php");

    if(isset($_COOKIE['dailyCalories']) && isset($_COOKIE['dailySucres']) && isset($_COOKIE['metabolisme'])) {
        $dailyCalories = $_COOKIE['dailyCalories'];
        $dailySucres = $_COOKIE['dailySucres'];
        $metabolisme = $_COOKIE['metabolisme'];
    }
?>

<body>

<?php
    $currentPageId = 'debuter';
    if(isset($_GET['page'])){
        $currentPageId=$_GET['page'];
    }

    renderMenuToHTML($currentPageId);
    if ($is_connected){
        echo '
            <div class="row m-auto">
                <div class="col-6 text-left">
                    <h5 class="text-green">Bienvenue '.$nom.'</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="index.php?deconnexion">Déconnexion</a>
                </div>
            </div>
            <hr>';

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

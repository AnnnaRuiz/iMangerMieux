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
    

    if(isset($_SESSION['email'])) {
        $login = $_SESSION['email'];
        $is_connected = True;
    }

    if(isset($_POST['email'])) {
        $login = $_POST['email'];
        $_SESSION['email'] = $login;
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
    echo "<h5>Bienvenue ".$login."</h5>";

    $pageToInclude = $currentPageId . ".php";

    if(is_readable($pageToInclude)){
        require_once($pageToInclude);
    }   
    else{
        require_once("error.php");
    }

?>

<?php if (!$is_connected): ?>
    
    <div class="container justify-content-center d-flex align-items-center mb-3" >
        <div class="card p-4">
            <h2 class="text-center mb-4">Connexion</h2>
            <form id="login_form" action="connected.php" method="post">
                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Votre email">
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe</label>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
            </form>
        </div>
    </div>

<?php else: ?>

    <div>
        <a href="index.php?deconnexion">Déconnexion</a>
    </div>

<?php endif ?>

<?php require('template_footer.php') ?>

</body>


</html>
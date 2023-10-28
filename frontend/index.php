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

    if(isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
        $is_connected = True;
    }

    if(isset($_POST['login'])) {
        $login = $_POST['login'];
        $_SESSION['login'] = $login;
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
    echo "<h3 class='text-center bg-light m-0'>Bienvenue ".$login."</h3>";
    renderMenuToHTML($currentPageId);

   $pageToInclude = $currentPageId . ".php";
   if(is_readable($pageToInclude)){
      require_once($pageToInclude);
   }   
   else{
      require_once("error.php");
   }


require('template_footer.php') ?>

</body>


</html>
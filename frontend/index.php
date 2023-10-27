<!DOCTYPE html>
<html>

<?php 
    require_once('config.php');
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
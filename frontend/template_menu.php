
<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        $mymenu = array(
            // idPage titre
            'accueil' => array( 'Accueil'),
            'repas' => array( 'Repas' ),
            'aliments' => array( 'Aliments'),
            'journal'=>array('Journal'),
            'profil' => array('Profil'),
        );

    echo '<nav class="menu color">
             <ul class="row">
                <br>
                <a href="index.php?page=accueil">
                    <div class="col"><img style="height: 50px" src="images/iMM.png" alt="iMM Logo">
                    </div></a>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li class="col list-unstyled">';
        if($pageId == $currentPageId ) {
            echo '<a id="currentpage" class="text-decoration-none text-white" href="index.php?page='.$pageId.' onclick="reloadPage()">'.$pageParameters[0].'</a>';
        
        } else {
            echo '<a class="text-decoration-none text-white" href="index.php?page='.$pageId.'">'.$pageParameters[0].'</a>';
        }
        echo '</li>';
    }
    
    echo '</ul> </nav>';
        
    }



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
             <ul class="row m-0">
                <br>';

    foreach($mymenu as $pageId => $pageParameters) {
        echo '<li class="col m-0 list-unstyled">';
        if($pageId == $currentPageId ) {
            echo '<a id="currentpage" class="text-decoration-none" href="index.php?page='.$pageId.'">'.$pageParameters[0].'</a>';
        
        } else {
            echo '<a class="text-decoration-none" href="index.php?page='.$pageId.'">'.$pageParameters[0].'</a>';
        }
        echo '</li>';
    }
    
    echo '</ul> </nav>';
        
    }


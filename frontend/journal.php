<?php 
if(isset($_COOKIE['dailyCalories']) && isset($_COOKIE['dailySucres']) && isset($_COOKIE['dailyLipides']) && isset($_COOKIE['dailyGlucides']) && isset($_COOKIE['dailyProteines'])) {
    $dailyCalories = $_COOKIE['dailyCalories'];
    $dailySucres = $_COOKIE['dailySucres'];
    $dailyLipides = $_COOKIE['dailyLipides'];
    $dailyGlucides = $_COOKIE['dailyGlucides'];
    $dailyProteines = $_COOKIE['dailyProteines'];
}

?>
    <div class="row justify-content-center">
        <button type="button" class="btn btn-primary" id="miseAJourDatas">Actualiser les données</button>
    </div>
    
    <hr>

    <h1 class="text-center mb-5">Statistiques du jour</h1>

    <?php //statistics($tmp='daily'); ?>

    <div class='row justify-content-center'>
        <h4>Calories consommées par rapport au total recommandé calculé d'après votre profil :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $dailyCalories?>%;' aria-valuenow='<?= $dailyCalories?>' aria-valuemin='0' aria-valuemax='100'><?= $dailyCalories?>%</div>
        </div>
    </div> 
    <br>
    <div class='row justify-content-center'>
        <h4>Sucre consommé sur la journée par rapport au total recommandé par l'OMS :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $dailySucres?>%;' aria-valuenow='<?= $dailySucres?>' aria-valuemin='0' aria-valuemax='100'><?= $dailySucres?>%</div>
        </div>
        <p> Recommandations de l'OMS : moins de 10 % de la ration énergétique totale quotidienne</p>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Porportions de lipides, glucides et protéines consommées sur la journée :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $dailyLipides?>%' aria-valuenow='<?= $dailyLipides?>' aria-valuemin='0' aria-valuemax='100'><?= $dailyLipides?>%</div>
            <div class='progress-bar bg-success' role='progressbar' style='width: <?= $dailyGlucides?>%' aria-valuenow='<?= $dailyGlucides?>' aria-valuemin='0' aria-valuemax='100'><?= $dailyGlucides?>%</div>
            <div class='progress-bar bg-info' role='progressbar' style='width: <?= $dailyProteines?>%' aria-valuenow='<?= $dailyProteines?>' aria-valuemin='0' aria-valuemax='100'><?= $dailyProteines?>%</div>
        </div>
    </div>


    <hr>


    <h1 class="text-center mb-5">Statistiques hebdomadaire</h1>
    <?php //statistics($tmp='weekly'); ?>


    <hr>


    <h1 class="text-center mb-5">Statistiques mensuel</h1>
    <?php //statistics($tmp='monthly'); ?>



    <hr>


<?php

// function statistics($tmp){
//     define('Calories', 'Calories');
//     echo "
//     <div class='row justify-content-center'>
//         <h4>Calories consommées par rapport au total recommandé calculé d'après votre profil :</h4>
//         <div class='col-9 progress'>
//             <div class='progress-bar' role='progressbar' style='width:". $tmp.Calories."' aria-valuenow='".$tmp.Calories."' aria-valuemin='0' aria-valuemax='100'>".$tmp.Calories."%</div>
//         </div>
//     </div>
//     ";
// }


?>

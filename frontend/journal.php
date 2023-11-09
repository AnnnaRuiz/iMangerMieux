<?php 
if(isset($_COOKIE['dailyCalories']) && isset($_COOKIE['dailySucres']) && isset($_COOKIE['dailyLipides']) && isset($_COOKIE['dailyGlucides']) && isset($_COOKIE['dailyProteines'])) {
    $dailyCalories = $_COOKIE['dailyCalories'];
    $dailySucres = $_COOKIE['dailySucres'];
    $dailyLipides = $_COOKIE['dailyLipides'];
    $dailyGlucides = $_COOKIE['dailyGlucides'];
    $dailyProteines = $_COOKIE['dailyProteines'];
}

if(isset($_COOKIE['weeklyCalories']) && isset($_COOKIE['weeklySucres']) && isset($_COOKIE['weeklyLipides']) && isset($_COOKIE['weeklyGlucides']) && isset($_COOKIE['weeklyProteines'])) {
    $weeklyCalories = $_COOKIE['weeklyCalories'];
    $weeklySucres = $_COOKIE['weeklySucres'];
    $weeklyLipides = $_COOKIE['weeklyLipides'];
    $weeklyGlucides = $_COOKIE['weeklyGlucides'];
    $weeklyProteines = $_COOKIE['weeklyProteines'];
}

if(isset($_COOKIE['monthlyCalories']) && isset($_COOKIE['monthlySucres']) && isset($_COOKIE['monthlyLipides']) && isset($_COOKIE['monthlyGlucides']) && isset($_COOKIE['monthlyProteines'])) {
    $monthlyCalories = $_COOKIE['monthlyCalories'];
    $monthlySucres = $_COOKIE['monthlySucres'];
    $monthlyLipides = $_COOKIE['monthlyLipides'];
    $monthlyGlucides = $_COOKIE['monthlyGlucides'];
    $monthlyProteines = $_COOKIE['monthlyProteines'];
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


    <h1 class="text-center mb-5">Statistiques hebdomadaires</h1>
    <?php //statistics($tmp='weekly'); ?>

    <div class='row justify-content-center'>
        <h4>Calories consommées par rapport au total recommandé calculé d'après votre profil :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $weeklyCalories?>%;' aria-valuenow='<?= $weeklyCalories?>' aria-valuemin='0' aria-valuemax='100'><?= $weeklyCalories?>%</div>
        </div>
    </div> 
    <br>
    <div class='row justify-content-center'>
        <h4>Sucre consommé sur la journée par rapport au total recommandé par l'OMS :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $weeklySucres?>%;' aria-valuenow='<?= $weeklySucres?>' aria-valuemin='0' aria-valuemax='100'><?= $weeklySucres?>%</div>
        </div>
        <p> Recommandations de l'OMS : moins de 10 % de la ration énergétique totale quotidienne</p>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Porportions de lipides, glucides et protéines consommées sur la journée :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $weeklyLipides?>%' aria-valuenow='<?= $weeklyLipides?>' aria-valuemin='0' aria-valuemax='100'><?= $weeklyLipides?>%</div>
            <div class='progress-bar bg-success' role='progressbar' style='width: <?= $weeklyGlucides?>%' aria-valuenow='<?= $weeklyGlucides?>' aria-valuemin='0' aria-valuemax='100'><?= $weeklyGlucides?>%</div>
            <div class='progress-bar bg-info' role='progressbar' style='width: <?= $weeklyProteines?>%' aria-valuenow='<?= $weeklyProteines?>' aria-valuemin='0' aria-valuemax='100'><?= $weeklyProteines?>%</div>
        </div>
    </div>

    <hr>


    <h1 class="text-center mb-5">Statistiques mensuelles</h1>
    <?php //statistics($tmp='monthly'); ?>

    <div class='row justify-content-center'>
        <h4>Calories consommées par rapport au total recommandé calculé d'après votre profil :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $monthlyCalories?>%;' aria-valuenow='<?= $monthlyCalories?>' aria-valuemin='0' aria-valuemax='100'><?= $monthlyCalories?>%</div>
        </div>
    </div> 
    <br>
    <div class='row justify-content-center'>
        <h4>Sucre consommé sur la journée par rapport au total recommandé par l'OMS :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $monthlySucres?>%;' aria-valuenow='<?= $monthlySucres?>' aria-valuemin='0' aria-valuemax='100'><?= $monthlySucres?>%</div>
        </div>
        <p> Recommandations de l'OMS : moins de 10 % de la ration énergétique totale quotidienne</p>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Porportions de lipides, glucides et protéines consommées sur la journée :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: <?= $monthlyLipides?>%' aria-valuenow='<?= $monthlyLipides?>' aria-valuemin='0' aria-valuemax='100'><?= $monthlyLipides?>%</div>
            <div class='progress-bar bg-success' role='progressbar' style='width: <?= $monthlyGlucides?>%' aria-valuenow='<?= $monthlyGlucides?>' aria-valuemin='0' aria-valuemax='100'><?= $monthlyGlucides?>%</div>
            <div class='progress-bar bg-info' role='progressbar' style='width: <?= $monthlyProteines?>%' aria-valuenow='<?= $monthlyProteines?>' aria-valuemin='0' aria-valuemax='100'><?= $monthlyProteines?>%</div>
        </div>
        <p> Recommandations sur la répartitions des calroies venant de lipides, glucides et protéines: 135-40 % pour les lipides, 45-50 % pour les glucides et 5% pour les protéines </p>
    </div>



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

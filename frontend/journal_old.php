<?php require_once('calculsJournal.php') ?>


<button type="button" class="btn btn-primary" id="miseAJourDatas">Actualiser les données</button>


<hr>


<h1 class="text-center mb-5">Statistiques du jour</h1>
<?php statistics($caloriesPercentageDay, $sucrePercentageDay, $lipPercentageDay, $gluPercentageDay, $protPercentageDay); ?>


<hr>


<h1 class="text-center mb-5">Statistiques hebdomadaire</h1>
<?php statistics($caloriesPercentageWeek, $sucrePercentageWeek, $lipPercentageWeek, $gluPercentageWeek, $protPercentageWeek); ?>


<hr>


<h1 class="text-center mb-5">Statistiques mensuel</h1>
<?php statistics($caloriesPercentageMonth, $sucrePercentageMonth, $lipPercentageMonth, $gluPercentageMonth, $protPercentageMonth); ?>


<hr>



<?php

function statistics($caloriesPercentage, $sucrePercentage, $lipPercentage, $gluPercentage, $protPercentage){
    echo "
        <div class='row justify-content-center'>
        <h4>Calories consommées par rapport au total recommandé calculé d'après votre profil :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: ".$caloriesPercentage."%;' aria-valuenow='".$caloriesPercentage."' aria-valuemin='0' aria-valuemax='100'>".$caloriesPercentage."%</div>
        </div>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Sucre consommé sur la journée par rapport au total recommandé par l'OMS :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: ".$sucrePercentage."%;' aria-valuenow='".$sucrePercentage."' aria-valuemin='0' aria-valuemax='100'>".$sucrePercentage."%</div>
        </div>
        <p> Recommandations de l'OMS : moins de 10 % de la ration énergétique totale quotidienne</p>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Porportions de lipides, glucides et protéines consommées sur la journée :</h4>
        <div class='col-9 progress'>
            <div class='progress-bar' role='progressbar' style='width: ".$lipPercentage."%' aria-valuenow='".$lipPercentage."' aria-valuemin='0' aria-valuemax='100'>".$lipPercentage."%</div>
            <div class='progress-bar bg-success' role='progressbar' style='width: ".$gluPercentage."%' aria-valuenow='".$gluPercentage."' aria-valuemin='0' aria-valuemax='100'>".$gluPercentage."%</div>
            <div class='progress-bar bg-info' role='progressbar' style='width: ".$protPercentage."%' aria-valuenow='".$protPercentage."' aria-valuemin='0' aria-valuemax='100'>".$protPercentage."%</div>
        </div>
    </div>
    ";
}

?> 


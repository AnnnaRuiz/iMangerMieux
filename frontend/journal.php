<?php

// Tableau associatif pour stocker les types de statistiques
$statTypes = [
    'daily' => 'Statistiques du jour',
    'weekly' => 'Statistiques hebdomadaires',
    'monthly' => 'Statistiques mensuelles'
];

// Tableau associatif pour stocker les types de périodes
$periodTypes = [
    'daily' => 'quotidien',
    'weekly' => 'hebdomadaire',
    'monthly' => 'mensuel'
];

// Fonction pour générer les statistiques
function generateStatistics($periodType, $title, $calories, $sucres, $lipides, $glucides, $proteines, $metabolisme) {
    $cal = round(($calories * $metabolisme / 100),1);
    $met = round($metabolisme,0);
    echo "
    <h1 class='text-center mb-5'>$title</h1>
    
    <div class='row justify-content-center'>
        <h4>Calories consommées par rapport au total recommandé calculé d'après votre profil :</h4>
        <div class='col-9'>
            <div class='progress'>
                <div class='progress-bar' role='progressbar' style='width: $calories%;' aria-valuenow='$calories' aria-valuemin='0' aria-valuemax='100'>$calories%</div>
            </div>
            <p class='text-center'> Calories consommées : $cal kcal / $met kcal</p>
        </div>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Sucre consommé sur la journée par rapport au total recommandé par l'OMS :</h4>
        <div class='col-9'>
            <div class='progress'>
                <div class='progress-bar' role='progressbar' style='width: $sucres%;' aria-valuenow='$sucres' aria-valuemin='0' aria-valuemax='100'>$sucres%</div>
            </div>
            <p class='text-center'> Recommandations de l'OMS : moins de 10 % de la ration énergétique totale quotidienne</p>
        </div>
    </div>
    <br>
    <div class='row justify-content-center'>
        <h4>Proportions de lipides, glucides et protéines consommées sur la journée :</h4>
        <div class='col-9'>
            <div class='progress'>
                <div class='progress-bar' role='progressbar' style='width: $lipides%;' aria-valuenow='$lipides' aria-valuemin='0' aria-valuemax='100'>lip : $lipides%</div>
                <div class='progress-bar bg-success' role='progressbar' style='width: $glucides%;' aria-valuenow='$glucides' aria-valuemin='0' aria-valuemax='100'>glu : $glucides%</div>
                <div class='progress-bar bg-info' role='progressbar' style='width: $proteines%;' aria-valuenow='$proteines' aria-valuemin='0' aria-valuemax='100'>prot : $proteines%</div>
            </div>
            <p class='text-center'> Répartition recommandée des calories venant des lipides, glucides et protéines : 35-40 % pour les lipides, 45-50 % pour les glucides et 15% pour les protéines </p>
        </div>
    </div>
    <hr>
    ";
}

foreach ($periodTypes as $periodType => $periodName) {
    // Utilisez les variables correspondantes pour chaque type de statistique
    $calories = $_COOKIE[$periodType . 'Calories'];
    $sucres = $_COOKIE[$periodType . 'Sucres'];
    $lipides = $_COOKIE[$periodType . 'Lipides'];
    $glucides = $_COOKIE[$periodType . 'Glucides'];
    $proteines = $_COOKIE[$periodType . 'Proteines'];
    $metabolisme = $_COOKIE['metabolisme'];
    if(isset($_COOKIE['total_' . $periodType . '_data']) && $_COOKIE['total_' . $periodType . '_data']!=0){
        $nbJours = $_COOKIE['total_' . $periodType . '_data'];
    }else{
        $nbJours = 1;
    }
    $metabolisme = $metabolisme * $nbJours;
    
    generateStatistics($periodType, $statTypes[$periodType], $calories, $sucres, $lipides, $glucides, $proteines, $metabolisme);
}

?>

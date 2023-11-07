<?php

$metabolisme=0;

if ($sexe == 'M') {
    $metabolisme = 88.362 + (13.397 * $poids) + (4.799 * $taille) - (5.677 * $age);
} else {
    $metabolisme = 447.593 + (9.247 * $poids) + (3.098 * $taille) - (4.330 * $age);
} 

if( $activite == 'Sédentaire'){
    $metabolisme = $metabolisme * 1.2;
}elseif( $activite == 'Très peu actif'){
    $metabolisme = $metabolisme * 1.375;
}elseif( $activite == 'Peu actif'){
    $metabolisme = $metabolisme * 1.55;
}elseif( $activite == 'Actif'){
    $metabolisme = $metabolisme * 1.725;
}else{
    $metabolisme = $metabolisme * 1.9;
}

$caloriesPercentageDay=0; $sucrePercentageDay=0; $lipPercentageDay=0; $gluPercentageDay=0; $protPercentageDay=0;
$caloriesPercentageWeek=0; $sucrePercentageWeek=0; $lipPercentageWeek=0; $gluPercentageWeek=0; $protPercentageWeek=0;
$caloriesPercentageMonth=0; $sucrePercentageMonth=0; $lipPercentageMonth=0; $gluPercentageMonth=0; $protPercentageMonth=0;

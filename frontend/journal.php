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

?>




<hr>
<h1 class="text-center mb-5">Statistiques du jour</h1>

<div class="row justify-content-center">
    <h4>Calories consommées sur la journée par rapport au total recommandé calculé d'après votre profil :</h4>
    <div class="col-9 progress">
        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
    </div>
</div>
<hr>
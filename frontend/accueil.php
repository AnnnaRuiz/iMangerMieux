<?php 
// IMC = poids (en kg) / (taille (en m))^2

$nombre = $poids / (($taille/100)**2);
$IMC=number_format($nombre, 2, ',', '.');
$trancheIMC="";

$danger="text-danger font-weight-bold";

if($IMC<18.5){
    $trancheIMC="Insuffisance pondérale";
}elseif (18.5<=$IMC && $IMC<25){
    $trancheIMC="Poids normal";
    $danger="text-success";
}elseif (25<=$IMC && $IMC<30){
    $trancheIMC="Surpoids";
}elseif (30<=$IMC && $IMC<35){
    $trancheIMC="Obésité de classe 1 (modérée)";
}elseif (35<=$IMC && $IMC<40){
    $trancheIMC="Obésité de classe 2 (sévère)";
}elseif (40<=$IMC ){
    $trancheIMC="Obésité de classe 3 (très sévère ou morbide)";
}

if(isset($_COOKIE['dailyCalories']) && isset($_COOKIE['dailySucres']) && isset($_COOKIE['metabolisme']) && isset($_COOKIE['nbFruitsLegs'])) {
    $dailyCalories = $_COOKIE['dailyCalories'];
    $dailySucres = $_COOKIE['dailySucres'];
    $metabolisme = $_COOKIE['metabolisme'];
    $nbFruitsLegs = $_COOKIE['nbFruitsLegs'];
}

$qteSucreRecommande = ($metabolisme * 10) / 400 ;


?>


<h1 class="text-center">Tableau de bord</h1>

<div class="row font-italic my-3 border">
    <div class="col-12 text-center">
        <p>Une alimentation saine est essentielle pour une meilleure santé.</p>
        <p>Vous cherchez à améliorer vos choix alimentaires ? Optez pour iMangerMieux, suivez vos repas, et découvrez vos habitudes pour atteindre vos objectifs.</p>
        <p>Enregistrez vos repas parmi un large choix d'aliments inclus directement dans notre site.</p>
        <p>Consultez l'analyse des calories et des nutriments, comparez les portions, et apprenez comment les aliments que vous consommez contribuent à vos objectifs de bien-être.</p>
    </div>
</div>
<div class="row justify-content-center">
    
    <div class="col-6 border border-dark rounded bg-light text-center">
        <h3> Votre IMC : <?php echo $IMC?></h3>
        <p class="<?php echo $danger?>"><?php echo $trancheIMC?></p>
    </div>
</div class="row">
   

<div class="row justify-content-center my-3">
    <div class="col-3 border border-dark rounded bg-light text-center mx-5">
        <h3><i class="fas fa-utensils" style="color: #2DCD9D;"></i> Calories consommées : <?php $cal = round(($dailyCalories * $metabolisme / 100),1); echo $cal?> kcal / <?php echo round($metabolisme,0)?>kcal</h3>
        <p> le total est calculé à partir des données de votre profil <p>
    </div>
    
    <div class="col-3 border border-dark rounded bg-light text-center mx-5">
        <h3><i class="fas fa-cookie-bite" style="color: #2DCD9D;"></i> Sucre consommé : <?php echo round($dailySucres * $metabolisme / 4000,1)?>g / <?php echo round($qteSucreRecommande,0)?>g</h3>
        <p> le total est basé sur les recommandations de l'OMS et calculé à partir des données de votre profil <p>
    </div>

    <div class="col-3 border border-dark rounded bg-light text-center mx-5">
        <h3><i class="fas fa-apple-alt" style="color: #2DCD9D;"></i> Fruits et légumes consommés ce jour : <?php echo $nbFruitsLegs?>/5</h3>
        <p> d'après les recommendations du Programme National Nutrition Santé (PNNS) <p>
    </div> 
</div class="row">

<div class="row border m-auto justify-content-center">
    <div class="col-3 mx-5 my-3">
        <h5 class="text-green text-center">Des outils adaptés à vos objectifs</h5>
        <p class="text-justify">Que vous visiez la perte de poids, le renforcement musculaire, une baisse de votre IMC, ou une amélioration générale de votre santé, iMangerMieux vous offre les fonctionnalités adéquates.</p>
    </div>
    <div class="col-3 mx-5 my-3">
        <h5 class="text-green text-center">Découvrir. Suivre. Progresser.</h5>
        <p class="text-justify">Garder un journal alimentaire vous permettra de mieux comprendre vos habitudes alimentaires et d'augmenter vos chances d'atteindre vos objectifs.</p>
    </div>
    <div class="col-3 mx-5 my-3">
        <h5 class="text-green text-center">Enregistrement des repas et ajout d'aliments simplifiés.</h5>
        <p class="text-justify">Enregistrez des repas et de nouveaux aliments, et utilisez les outils à disposition pour un suivi alimentaire pratique et efficace."</p>
    </div>
</div>
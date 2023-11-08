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
?>


<h1 class="text-center">Tableau de bord</h1>
<div class="container d-flex justify-content-center my-3">
    <div class="row border border-dark rounded bg-light ">
        <div class="col-12 text-center">
                <h3> Votre IMC : <?php echo $IMC?></h3>
                <p class="<?php echo $danger?>"><?php echo $trancheIMC?></p>
        </div>
    </div>
</div>
<div class="row" style="margin: 10px;">
    <p>Une alimentation saine est essentielle pour une meilleure santé.</p>
    <p>Vous cherchez à améliorer vos choix alimentaires ? Optez pour iMangerMieux, suivez vos repas, et découvrez vos habitudes pour atteindre vos objectifs.</p>
    <p>Enregistrez vos repas parmi un large choix d'aliments inclus directtement dans notre site.</p>
    <p>Consultez l'analyse des calories et des nutriments, comparez les portions, et apprenez comment les aliments que vous consommez contribuent à vos objectifs de bien-être.</p>
</div>
<div class="row" style="margin: 10px;">
    <div class="col m-5">
        <h5>Des outils adaptés à vos objectifs</h5>
        <p>Que vous visiez la perte de poids, le renforcement musculaire, une baisse de votre IMC, ou une amélioration générale de votre santé, iMangerMieux vous offre les fonctionnalités adéquates.</p>
    </div>
    <div class="col m-5">
        <h5>Découvrir. Suivre. Progresser.</h5>
        <p>Garder un journal alimentaire vous permettra de mieux comprendre vos habitudes alimentaires et d'augmenter vos chances d'atteindre vos objectifs.</p>
    </div>
    <div class="col m-5">
        <h5>Enregistrement des repas et ajout d'aliments simplifiés.</h5>
        <p>Enregistrez des repas et de nouveaux aliments, et utilisez les outils à dispoosition pour un suivi alimentaire pratique et efficace."</p>
    </div>
</div>
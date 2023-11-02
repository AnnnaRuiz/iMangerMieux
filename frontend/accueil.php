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
    
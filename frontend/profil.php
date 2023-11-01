
<?php
$email = $_SESSION['email'];
$pwd = $_SESSION['pwd'];
$nom = $_SESSION['nom'];
$taille = $_SESSION['taille'];
$sexe = $_SESSION['sexe'];
$poids = $_SESSION['poids'];
$age = $_SESSION['age'];
$activite = $_SESSION['activite'];

?>


<div class="container mb-3">
    <div class="row">
        <div class="col-12">
            <div class="row mb-1">
                <div class="container border border-dark bg-light rounded">
                    <h2 class="text-center"> <i class="fas fa-user" style="color: #000000;"></i> Profil</h2>
                </div>
            </div>
            <div class="row border border-dark bg-light rounded justify-content-center">
                <div class="col-5 m-3 border rounded">
                    <h4 class="text-center">Données de connexion</h4>
                    <hr/>
                    <p>Nom : <?php ?></p>
                    <p>Email : <?php ?></p>
                    <p class="border rounded d-inline-flex"> Mot de passe <?php ?></p>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary ml-auto" onclick="modifyUserAccount(this)">Modifier</button>
                    </div>
                </div>
                <div class="col-5 m-3 border rounded">
                    <h4 class="text-center">Informations sur l'utilisateur</h4>
                    <hr/>
                    <p>Sexe : <?php ?></p>
                    <p>Poids : <?php ?></p>
                    <p>Taille : <?php ?></p>
                    <p>Âge : <?php ?></p>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary ml-auto" onclick="modifyUserInfo(this)">Modifier</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

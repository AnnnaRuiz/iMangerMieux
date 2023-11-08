
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
                    <h4 class="text-center text-green">Données de connexion</h4>
                    <hr/>
                    <div class="row" style="margin-left: 10px;">
                        <p>Nom : </p>
                        <div id="nomContainer">
                            <p class="ml-2"><?php  echo $nom?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Email : </p>
                        <div>
                            <p class="ml-2"><?php echo $login?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p class="border rounded d-inline-flex"> Mot de passe </p>
                        <div>
                            <p class="ml-2"><?php echo '****'?></p>
                        </div>
                    </div>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary ml-auto" onclick="modifyUserAccount(this)">Modifier</button>
                    </div>
                </div>
                <div class="col-5 m-3 border rounded">
                    <h4 class="text-center text-green">Informations sur l'utilisateur</h4>
                    <hr/>
                    <div class="row" style="margin-left: 10px;">
                        <p>Sexe (F ou M) : </p>
                        <div id="sexeContainer">
                            <p class="ml-2"><?php  echo $sexe?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Âge : </p>
                        <div id="ageContainer">
                            <p class="ml-2"><?php  echo $age?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Poids : </p>
                        <div id="poidsContainer">
                            <p class="ml-2"><?php  echo $poids?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Taille : </p>
                        <div id="tailleContainer">
                            <p class="ml-2"><?php  echo $taille?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Activité : </p>
                        <div id="activiteContainer">
                            <p class="ml-2"><?php  echo $activite?></p>
                        </div>
                    </div>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary ml-auto" onclick="modifyUserInfo(this)">Modifier</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>


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
                    <p>Nom : <?php  echo $nom?></p>
                    <p>Email : <?php echo $login?></p>
                    <p class="border rounded d-inline-flex"> Mot de passe <?php ?></p>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary ml-auto" onclick="modifyUserAccount(this)">Modifier</button>
                    </div>
                </div>
                <div class="col-5 m-3 border rounded">
                    <h4 class="text-center">Informations sur l'utilisateur</h4>
                    <hr/>
                    <p>Sexe : <?php echo $sexe?></p>
                    <p>Poids : <?php echo $poids?> kg</p>
                    <p>Taille : <?php echo $taille?> cm</p>
                    <p>Âge : <?php echo $age?> ans</p>
                    <div class="row m-3">
                        <button type="button" class="btn btn-primary ml-auto" onclick="modifyUserInfo(this)">Modifier</button>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

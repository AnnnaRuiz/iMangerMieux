
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
                        <div style="margin-left: 10px;">
                            <p><?php  echo $nom?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Email : </p>
                        <div style="margin-left: 10px;">
                            <p><?php echo $login?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                    <p class="border rounded d-inline-flex"> Mot de passe </p>
                        <div style="margin-left: 10px;">
                            <p><?php echo '****'?></p>
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
                        <p>Sexe : </p>
                        <div style="margin-left: 10px;">
                            <p><?php  echo $sexe?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Âge : </p>
                        <div style="margin-left: 10px;">
                            <p><?php  echo $age?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Poids : </p>
                        <div style="margin-left: 10px;">
                            <p><?php  echo $poids?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Taille : </p>
                        <div style="margin-left: 10px;">
                            <p><?php  echo $taille?></p>
                        </div>
                    </div>
                    <div class="row" style="margin-left: 10px;">
                        <p>Activité : </p>
                        <div style="margin-left: 10px;">
                            <p><?php  echo $activite?></p>
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
<script>
    function modifyUserAccount(button) {
        // Sélectionne la zone d'affichage des données de connexion
        let userAccountInfo = $(button).closest(".col-5");

        // Récupère les éléments de données de connexion
        let nom = userAccountInfo.find("p:contains('Nom')").next("div").text();
        let motDePasse = userAccountInfo.find("p:contains('Mot de passe')").next("div").text();

        // Remplace les éléments de données par des champs de saisie pré-remplis
        userAccountInfo.find("p:contains('Nom')").next("div").html('<input type="text">');
        userAccountInfo.find("p:contains('Mot de passe')").next("div").html('<input type="password">');

        // Désactive le champ d'e-mail
        userAccountInfo.find("input[type='email']").prop('disabled', true);

        // Remplace le bouton "Modifier" par un bouton "Enregistrer"
        userAccountInfo.find("button:contains('Modifier')").replaceWith(`<button type="button" class="btn btn-success ml-auto" onclick="saveUserAccount(this)">Enregistrer</button>`);
    }

    
    function saveUserAccount(button) {
        // Sélectionne la zone d'affichage des données de connexion
        let userAccountInfo = $(button).closest(".col-5");

        // Récupère les nouvelles valeurs des champs
        let nouveauNom = userAccountInfo.find("input[type='text']").val();
        let nouveauMotDePasse = userAccountInfo.find("input[type='password']").val();

        // Remplace les champs de saisie par les nouvelles valeurs
        userAccountInfo.find("p:contains('Nom')").next("div").html(nouveauNom);
        userAccountInfo.find("p:contains('Mot de passe')").next("div").html('****');

        // Réactive le champ d'e-mail s'il a été désactivé
        userAccountInfo.find("input[type='email']").prop('disabled', false);

        // Remplace le bouton "Enregistrer" par un bouton "Modifier"
        userAccountInfo.find("button:contains('Enregistrer')").replaceWith(`<button type="button" class="btn btn-primary ml-auto" onclick="modifyUserAccount(this)">Modifier</button>`);
        
        $.ajax({
            type: 'PUT',
            url: apiURL + '/users.php',
            data: { NOM: nouveauNom, MDP: nouveauMotDePasse },
            success: function(response) {
                // Gérer la réponse du serveur si nécessaire
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    }

    function modifyUserInfo(button) {
        // Sélectionne la zone d'affichage des informations sur l'utilisateur
        let userInfo = $(button).closest(".col-5");
    
        // Récupère les éléments d'informations sur l'utilisateur
        let sexe = userInfo.find("p:contains('Sexe')").next("div").text();
        let age = userInfo.find("p:contains('Âge')").next("div").text();
        let poids = userInfo.find("p:contains('Poids')").next("div").text();
        let taille = userInfo.find("p:contains('Taille')").next("div").text();
        let activite = userInfo.find("p:contains('Activité')").next("div").text();

    
        // Remplace les éléments d'informations par des champs de saisie pré-remplis
        userInfo.find("p:contains('Sexe')").next("div").html('<input type="text">');
        userInfo.find("p:contains('Âge')").next("div").html('<input type="number">');
        userInfo.find("p:contains('Poids')").next("div").html('<input type="number">');
        userInfo.find("p:contains('Taille')").next("div").html('<input type="number">');
        userInfo.find("p:contains('Activité')").next("div").html('<input type="text">');

    
        // Remplace le bouton "Modifier" par un bouton "Enregistrer"
        userInfo.find("button:contains('Modifier')").replaceWith(`<button type="button" class="btn btn-success ml-auto" onclick="saveUserInfo(this)">Enregistrer</button>`);
    }

    // Fonction pour enregistrer les informations sur l'utilisateur modifiées
    function saveUserInfo(button) {
        // Sélectionne la zone d'affichage des informations sur l'utilisateur
        let userInfo = $(button).closest(".col-5");

        // Récupère les nouvelles valeurs des champs de saisie
        let newSexe = userInfo.find("p:contains('Sexe')").next("div").find("input").val();
        let newAge = userInfo.find("p:contains('Âge')").next("div").find("input").val();
        let newPoids = userInfo.find("p:contains('Poids')").next("div").find("input").val();
        let newTaille = userInfo.find("p:contains('Taille')").next("div").find("input").val();
        let newActivite = userInfo.find("p:contains('Activité')").next("div").find("input").val();


        // Une fois que les données sont enregistrées avec succès, vous pouvez
        // remettre en place les éléments de texte et le bouton "Modifier".
        userInfo.find("p:contains('Sexe')").next("div").html(newSexe);
        userInfo.find("p:contains('Âge')").next("div").html(newAge);
        userInfo.find("p:contains('Poids')").next("div").html(newPoids);
        userInfo.find("p:contains('Taille')").next("div").html(newTaille);
        userInfo.find("p:contains('Activité')").next("div").html(newActivite);


        // Remplace le bouton "Enregistrer" par un bouton "Modifier"
        userInfo.find("button:contains('Enregistrer')").replaceWith(`<button type="button" class="btn btn-primary ml-auto" onclick="modifyUserInfo(this)">Modifier</button>`);
    
        // Vous pouvez envoyer les nouvelles valeurs au serveur ici pour les enregistrer
        $.ajax({
            type: 'PUT',
            url: apiURL + '/users.php',
            data: { SEXE: newSexe, AGE: newAge, POIDS: newPoids, TAILLE: newTaille, ACTIVITE: newActivite},
            success: function(response) {
                // Gérer la réponse du serveur si nécessaire
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
        
    }
</script>
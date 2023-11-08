
function modifyUserAccount(button) {
    
    // Sélectionne la zone d'affichage des données de connexion
    let userAccountInfo = $(button).closest(".col-5");

    // Récupère les éléments de données de connexion
    let nom = document.getElementById('nomContainer').innerText;

    // Remplace les éléments de données par des champs de saisie pré-remplis
    userAccountInfo.find("p:contains('Nom')").next("div").html('<input type="text" value="'+nom+'">');
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
    let taille = document.getElementById('tailleContainer').innerText;
    let poids = document.getElementById('poidsContainer').innerText;
    let age = document.getElementById('ageContainer').innerText;
    let sexe = document.getElementById('sexeContainer').innerText;
    let activite = document.getElementById('activiteContainer').innerText;


    // Remplace les éléments d'informations par des champs de saisie pré-remplis
    userInfo.find("p:contains('Sexe')").next("div").html('<input type="text" value="'+sexe+'">');
    userInfo.find("p:contains('Âge')").next("div").html('<input type="number" class="form-control" id="inputAge" min="0" value="'+age+'">');
    userInfo.find("p:contains('Poids')").next("div").html('<input type="number" class="form-control"  step="0.1" id="inputPoids" min="0" value="'+poids+'" >');
    userInfo.find("p:contains('Taille')").next("div").html('<input type="number" class="form-control" id="inputTaille" min="0" value="'+taille+'" >');
    userInfo.find("p:contains('Activité')").next("div").html(`<select id="inputActivite">
                    <option value="Sédentaire">Sédentaire (peu ou pas d'exercice)</option>
                    <option value="Très peu actif">Très peu actif (exercice léger 1-3j /semaine)</option>
                    <option value="Peu actif">Peu actif (exercice modéré 3-5j /semaine)</option>
                    <option value="Actif">Actif (exercice intense 6-7j /semaine)</option>
                    <option value="Très actif">Très actif (exercice journalier trsè intense)</option>
                </select>`);


    // Remplace le bouton "Modifier" par un bouton "Enregistrer"
    userInfo.find("button:contains('Modifier')").replaceWith(`<button type="button" class="btn btn-success ml-auto" onclick="saveUserInfo(this)">Enregistrer</button>`);
}

function saveUserInfo(button) {
    // Sélectionne la zone d'affichage des informations sur l'utilisateur
    let userInfo = $(button).closest(".col-5");

    // Récupère les nouvelles valeurs des champs de saisie
    let newSexe = userInfo.find("p:contains('Sexe')").next("div").find("input").val();
    let newAge = userInfo.find("p:contains('Âge')").next("div").find("input").val();
    let newPoids = userInfo.find("p:contains('Poids')").next("div").find("input").val();
    let newTaille = userInfo.find("p:contains('Taille')").next("div").find("input").val();
    let newActivite = userInfo.find("p:contains('Activité')").next("div").find("select").val();


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
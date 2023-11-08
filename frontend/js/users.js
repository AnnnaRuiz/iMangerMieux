$(document).ready(function() {

    $('input[type="radio"]').change(function() {
        $('#inputSexe').val($('input[name="sexe"]:checked').val());
    });

    $('#createUserForm').submit(function(event) {
        event.preventDefault();
        
        let nom = $('#inputNom').val();
        let mail = $('#inputMail').val();
        let mdp = $('#inputMdp').val();
        let age = $('#inputAge').val();
        let taille = $('#inputTaille').val();
        let poids = $('#inputPoids').val();
        let sexe = $('#inputSexe').val();
        let activite = $('#inputActivite').val();

        $.ajax({
            type: 'POST',
            url: apiURL + '/users.php',
            data: {NOM: nom, MAIL: mail, MDP: mdp, TAILLE: taille, SEXE: sexe, POIDS: poids, AGE: age, ACTIVITE: activite},
            success: function(response) {
                alert("Création de l'utilisateur réussie");
                // Ajouter un bouton pour retourner à la page de connexion
                $('#retourConnexion').show();

                $('#inputNom').val('');
                $('#inputMail').val('');
                $('#inputMdp').val('');
                $('#inputAge').val('');
                $('#inputTaille').val('');
                $('#inputPoids').val('');
                $('#inputActivite').val('');
                $('#inputSexe').val('');
            },
            error: function(error) {
                alert("Création de l'utilisateur impossible. Rentrer une adresse mail différente.");
                console.error(error);
            }
        });
    });

    $('#loginForm').submit(function(event) {
        event.preventDefault();
        
        let email = $('#email').val();
        let pwd = $('#pwd').val();

        $.ajax({
            type: 'POST',
            url: apiURL + '/users.php',
            data: {email: email, pwd: pwd},
            success: function(response) {
                if (response) {
                    let user = JSON.parse(response);
                    reinitialiseAllCookies();
                    setCookie('sexe',user[0].SEXE);
                    setCookie('taille',user[0].TAILLE);
                    setCookie('poids',user[0].POIDS);
                    setCookie('age',user[0].AGE);
                    setCookie('activite',user[0].ACTIVITE);
                    window.location.href = 'index.php';
                } else {
                    console.error(response.error);
                }
            },
            error: function(error) {
                // L'authentification a échoué
                alert("Erreur d'email ou de mot de passe, veuillez réessayer");
                console.error(error);
            }
        });
    });
});

function setCookie(name, value) {
    var days = 1; // nombre de jours avant expirations du cookie
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function reinitialiseAllCookies() {
    let listCookies = ['dailySucres', 'dailyCalories', 'dailyLipides', 'dailyGlucides', 'dailyProteines'];

    for (let name of listCookies) {
       setCookie(name, 0);
    }
}

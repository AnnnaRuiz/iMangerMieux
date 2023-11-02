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
                    window.location.href = 'index.php'
                } else {
                    // L'authentification a échoué
                    console.error(response.error);
                }
            },
            error: function(error) {
                alert("Erreur d'email ou de mot de passe, veuillez réessayer");
                // console.error(error);
            }
        });
    });
});




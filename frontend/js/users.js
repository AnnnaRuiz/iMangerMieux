$(document).ready(function() {

    $('#createUser').click(function(event) {
        event.preventDefault();
        
        let nom = $('#NOM').val();
        let mail = $('#MAIL').val();
        let mdp = $('#MDP').val();
        let age = $('#AGE').val();
        let taille = $('#TAILLE').val();
        let poids = $('#POIDS').val();
        let sexe = $('#SEXE').val();
        let activite = $('#ACTIVITE').val();

        $.ajax({
            type: 'POST',
            url: apiURL + '/users.php',
            data: {nom: nom, mail: mail, mdp: mdp, taille: taille, sexe: sexe, poids: poids, age: age, activite: activite},
            success: function(response) {
                alert("Création de l'utilisateur réussie");
                // Ajouter un bouton pour retourner à la page de connexion
                $('#retourConnexion').show();

                $('#NOM').val('');
                $('#MAIL').val('');
                $('#MDP').val('');
                $('#AGE').val('');
                $('#TAILLE').val('');
                $('#POIDS').val('');
                $('#ACTIVITE').val('');
                $('#SEXE').val('');
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});




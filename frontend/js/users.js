


function createUser(name, email, password, taille, poids, sexe, age, activite) {
    $.ajax({
        type: 'POST',
        url: apiURL + '/users.php', 
        data: {
            NOM: name,
            MAIL: email,
            MDP: password,
            TAILLE: taille,
            POIDS: poids,
            SEXE: sexe,
            AGE: age,
            ACTIVITE: activite
        },
        success: function(data) {r
            console.log('Utilisateur créé avec succès', data);
        },
        error: function(error) {
            console.error('Erreur lors de la création de l\'utilisateur', error);
        }
    });
}

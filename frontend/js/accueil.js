$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: apiURL + '/accueil.php',
        data: {},
        success: function(response) {
            console.log('test:' + response);
        },

        error: function(error) {
            console.error(error);
        }
    });

})
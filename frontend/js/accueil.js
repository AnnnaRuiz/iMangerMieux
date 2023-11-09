$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: apiURL + '/accueil.php',
        data: {},
        success: function(response) {
            let test=response.fruitsLegs[0];
            console.log('test:' + test);
        },

        error: function(error) {
            console.error(error);
        }
    });

})
$(document).ready(function() {

    $.ajax({
        type: 'GET',
        url: apiURL + '/accueil.php',
        data: {},
        success: function(response) {
            var fruitsLegs = response.fruitsLegs[0];
            var nbFruitsLegs = fruitsLegs.total_daily_fruitslegs;
            setCookie('nbFruitsLegs', nbFruitsLegs);
            console.log('nbFruitsLegs:' + nbFruitsLegs);
        },

        error: function(error) {
            console.error(error);
        }
    });

})
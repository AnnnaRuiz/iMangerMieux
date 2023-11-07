$(document).ready(function() {

    $('#miseAJourDatas').click(function() {

        $.ajax({
            type: 'POST',
            url: apiURL + '/journal.php',
            data: {},
            success: function(response) {
                
            },

            error: function(error) {
                console.error(error);
            }
        });

    });

})
$.ajax({
    type: 'GET',
    url: apiURL + '/journal.php',
    data: {total_calories: calories, total_lipides: lipides, total_glucides: glucides, total_proteines: proteines, total_sucres : sucres},
    success: function(response) {
        
    },

    error: function(error) {
        console.error(error);
    }
});
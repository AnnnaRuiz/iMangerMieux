$(document).ready(function() {

    $('#miseAJourDatas').click(function() {

        $.ajax({
            type: 'POST',
            url: apiURL + '/journal.php',
            data: {},
            success: function(response) {
                var sexe = getCookie('sexe');
                //console.log("sexe : " + sexe)
                var taille = getCookie('taille');
                var poids = getCookie('poids');
                var age = getCookie('age');
                var activite = getCookie('activite');
            
                var dailyData = response.dailyData[0];
                console.log("calories : " + dailyData.total_daily_calories);
                var weeklyData = response.weeklyData;
                var monthlyData = response.monthlyData;
 
                let metabolisme = MB(sexe, taille, poids, age, activite);
                //console.log("metabolisme : " + metabolisme);

                let dailyCalories = dailyData.total_daily_calories * 100 / metabolisme;
                setCookie('dailyCalories', dailyCalories);
                let dailySucres = (dailyData.total_daily_sucres * 100 / metabolisme) * 10;
                setCookie('dailySucres', dailySucres);

                let lip_prot_glu = (dailyData.total_daily_lipides*9) + (dailyData.total_daily_glucides*4) + (dailyData.total_daily_proteines*4);
                
                let dailyLipides = (dailyData.total_daily_lipides * 9 / lip_prot_glu)*100;
                setCookie('dailyLipides', dailyLipides);
                let dailyGlucides = (dailyData.total_daily_glucides * 4 / lip_prot_glu)*100;
                setCookie('dailyGlucides', dailyGlucides);
                let dailyProteines = (dailyData.total_daily_proteines * 4 / lip_prot_glu)*100;
                setCookie('dailyProteines', dailyProteines);

                location.reload();
            },

            error: function(error) {
                console.error(error);
            }
        });

    });

})

function MB(sexe, taille, poids, age, activite){
    var metabolisme = 0;

    if (sexe === 'M') {
        metabolisme = 88.362 + (13.397 * poids) + (4.799 * taille) - (5.677 * age);
    } else {
        metabolisme = 447.593 + (9.247 * poids) + (3.098 * taille) - (4.330 * age);
    } 
    
    switch(activite) {
        case 'Sédentaire':
            metabolisme *= 1.2;
            break;
        case 'Très peu actif':
            metabolisme *= 1.375;
            break;
        case 'Peu actif':
            metabolisme *= 1.55;
            break;
        case 'Actif':
            metabolisme *= 1.725;
            break;
        default:
            metabolisme *= 1.9;
    }

    console.log("Le métabolisme est de " + metabolisme);

    return metabolisme;
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

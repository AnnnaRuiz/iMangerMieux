$(document).ready(function() {
        $.ajax({
            type: 'GET',
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
                var weeklyData = response.weeklyData[0];
                var monthlyData = response.monthlyData[0];
                //console.log("calories mois : " + monthlyData.total_monthly_calories);
 
                let metabolisme = MB(sexe, taille, poids, age, activite);
                setCookie('metabolisme', metabolisme);
                //console.log("metabolisme : " + metabolisme);

                //cookies pour les stats du jour
                let dailyCalories = (dailyData.total_daily_calories * 100 / metabolisme).toFixed(2);
                setCookie('dailyCalories', dailyCalories);
                //console.log("dailyCalories : " + dailyCalories);
                let dailySucres = ((dailyData.total_daily_sucres * 4 / metabolisme) * 100 * 10).toFixed(2);
                setCookie('dailySucres', dailySucres);

                let lip_prot_glu = (dailyData.total_daily_lipides*9) + (dailyData.total_daily_glucides*4) + (dailyData.total_daily_proteines*4);
                
                let dailyLipides = ((dailyData.total_daily_lipides * 9 / lip_prot_glu)*100).toFixed(2);
                setCookie('dailyLipides', dailyLipides);
                let dailyGlucides = ((dailyData.total_daily_glucides * 4 / lip_prot_glu)*100).toFixed(2);
                setCookie('dailyGlucides', dailyGlucides);
                let dailyProteines = ((dailyData.total_daily_proteines * 4 / lip_prot_glu)*100).toFixed(2);
                setCookie('dailyProteines', dailyProteines);
        
                // console.log("lip_prot_glu : " + lip_prot_glu);
                // console.log("dailyLipides : " + dailyLipides);
                // console.log("dailyGlucides : " + dailyGlucides);
                // console.log("dailyProteines : " + dailyProteines);

                //cookies pour les stats de la semaine 
                let nbDaysWeek = weeklyData.total_weekly_data;
                if(nbDaysWeek==0){
                    nbDaysWeek=1;
                }
                setCookie('total_weekly_data', nbDaysWeek);
                let weeklyCalories = ((weeklyData.total_weekly_calories/nbDaysWeek) * 100 / metabolisme).toFixed(2);
                setCookie('weeklyCalories', weeklyCalories);
                let weeklySucres = (((weeklyData.total_weekly_sucres/nbDaysWeek) * 100 / metabolisme) * 10).toFixed(2);
                setCookie('weeklySucres', weeklySucres);

                let lip_prot_glu_weekly = (weeklyData.total_weekly_lipides*9) + (weeklyData.total_weekly_glucides*4) + (weeklyData.total_weekly_proteines*4);

                let weeklyLipides = ((weeklyData.total_weekly_lipides * 9 / lip_prot_glu_weekly)*100).toFixed(2);
                setCookie('weeklyLipides', weeklyLipides);
                let weeklyGlucides = ((weeklyData.total_weekly_glucides * 4 / lip_prot_glu_weekly)*100).toFixed(2);
                setCookie('weeklyGlucides', weeklyGlucides);
                let weeklyProteines = ((weeklyData.total_weekly_proteines * 4 / lip_prot_glu_weekly)*100).toFixed(2);
                setCookie('weeklyProteines', weeklyProteines);
                
                //cookies pour les stats du mois
                let nbDaysMonth = monthlyData.total_monthly_data;
                if(nbDaysMonth==0){
                    nbDaysMonth=1;
                }
                setCookie('total_monthly_data', nbDaysMonth);
                //console.log("nbDaysMonth : " + nbDaysMonth);
                let monthlyCalories = ((monthlyData.total_monthly_calories/nbDaysMonth) * 100 / metabolisme).toFixed(2);
                setCookie('monthlyCalories', monthlyCalories);
                let monthlySucres = (((monthlyData.total_monthly_sucres/nbDaysMonth) * 100 / metabolisme) * 10).toFixed(2);
                setCookie('monthlySucres', monthlySucres);

                let lip_prot_glu_monthly = (monthlyData.total_monthly_lipides*9) + (monthlyData.total_monthly_glucides*4) + (monthlyData.total_monthly_proteines*4);

                let monthlyLipides = ((monthlyData.total_monthly_lipides * 9 / lip_prot_glu_monthly)*100).toFixed(2);
                setCookie('monthlyLipides', monthlyLipides);
                let monthlyGlucides = ((monthlyData.total_monthly_glucides * 4 / lip_prot_glu_monthly)*100).toFixed(2);
                setCookie('monthlyGlucides', monthlyGlucides);
                let monthlyProteines = ((monthlyData.total_monthly_proteines * 4 / lip_prot_glu_monthly)*100).toFixed(2);
                setCookie('monthlyProteines', monthlyProteines);

            },

            error: function(error) {
                console.error(error);
            }
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

    //console.log("Le métabolisme est de " + metabolisme);

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

function reloadPage() {
    location.reload();
}

// import apiURL from './config.js';

$(document).ready(function() {
    
    let table = $('#food').DataTable({
        ajax: {
            url: 'http://localhost:8888/iMangerMieux/backend/aliments.php',
            type: 'GET',
            dataSrc: '',
            error: function(xhr, error, thrown) {
                console.log('Erreur:', error);
            }
        },
        columns: [
            { data: `ID`, name: `Id` }, 
            { data: `ALIMENT`, name: `Nom` },
            { data: `CATEGORIE`, name: `Catégorie` },
            { data: `CALORIES`, name: `Calories /100g(ml)`  }, 
            { data: `LIPIDES`, name: `Lipides (%)`  }, 
            { data: `GLUCIDES`, name: `Glucides (%)`  },
            { data: `PROTEINES`, name: `Protéines (%)`  },
            { data: `SUCRE`, name: `Quantité de sucre (%)` },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                    `;
                }
            }
        ]
    });
    $('#submitBtn').click(function() {
        let name = $('#inputNom').val();
        let category = $('#inputCategorie').val();
        let kcal = $('#inputCalories').val();
        let lipides = $('#inputLip').val();
        let glucides = $('#inputGlu').val();
        let proteines = $('#inputProt').val();
        let sucre = $('#inputSucre').val();

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/iMangerMieux/backend/aliments.php',
            data: {ALIMENT: name, CATEGORIE: category, CALORIES: kcal, LIPIDES: lipides, GLUCIDES: glucides, PROTEINES: proteines, SUCRE: sucre},
            success: function(response) {
                let newFoodItem = `
                    <td>${response.ID}</td>
                    <td>${response.ALIMENT}</td>
                    <td>${response.CATEGORIE}</td>
                    <td>${response.CALORIES}</td>
                    <td>${response.LIPIDES}</td>
                    <td>${response.GLUCIDES}</td>
                    <td>${response.PROTEINES}</td>
                    <td>${response.SUCRE}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                    </td>
                `;

                table.row.add($(newFoodItem)).draw();

                $('#inputNom').val('');
                $('#inputCategorie').val('');
                $('#inputCalories').val('');
                $('#inputLip').val('');
                $('#inputGlu').val('');
                $('#inputProt').val('');
                $('#inputSucre').val('');
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
})

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
    $('#submitBtn').click(function(event) {
        event.preventDefault();
        
        let name = $('#inputNom').val();
        let categorie = $('#inputCategorie').val();
        let kcal = $('#inputCalories').val();
        let lipides = $('#inputLip').val();
        let glucides = $('#inputGlu').val();
        let proteines = $('#inputProt').val();
        let sucre = $('#inputSucre').val();

        $.ajax({
            type: 'POST',
            url: 'http://localhost:8888/iMangerMieux/backend/aliments.php',
            data: {ALIMENT: name, CATEGORIE: categorie, CALORIES: kcal, LIPIDES: lipides, GLUCIDES: glucides, PROTEINES: proteines, SUCRE: sucre},
            success: function(response) {
                let newFoodItem = `
                    <td>${response.name}</td>
                    <td>${response.categorie}</td>
                    <td>${response.calories}</td>
                    <td>${response.lipides}</td>
                    <td>${response.glucides}</td>
                    <td>${response.proteines}</td>
                    <td>${response.sucre}</td>
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

                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
})
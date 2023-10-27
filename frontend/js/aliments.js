$(document).ready(function() {
    
    let table = $('#food').DataTable({
        ajax: {
            url: apiURL + '/aliments.php',
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
                <tr>
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
                </tr>
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

function deleteRow(button) {
    let row = $(button).closest('tr');

    // Récupérer les valeurs actuelles des cellules
    let nom = row.find('td:eq(0)').text();
    $(`#food tbody tr[data-id="${nom}"]`).remove();

    $.ajax({
        type: 'DELETE',
        url: 'http://localhost:8888/iMangerMieux/backend/aliments.php',
        data: {ALIMENT: nom},
        success: function(response) {
            let table = $('#food').DataTable();
            table.row(row).remove().draw();

        },
        error: function(error) {
            console.error(error);
        }
    });
    }

    function modifyRow(button) {
        // Sélectionner la ligne parente
        let row = $(button).closest('tr');
    
        // Récupérer les valeurs actuelles des cellules
        let categorie = row.find('td:eq(1)').text();
        let calories = row.find('td:eq(2)').text();
        let lipides = row.find('td:eq(3)').text();
        let glucides = row.find('td:eq(4)').text();
        let proteines = row.find('td:eq(5)').text();
        let sucre = row.find('td:eq(6)').text();

    
        // Remplacer le contenu des cellules par des champs de saisie pré-remplis
        row.find('td:eq(1)').html(`<input type="text" value="${categorie}" />`);
        row.find('td:eq(2)').html(`<input type="number" step="0.1" value="${calories}" />`);
        row.find('td:eq(3)').html(`<input type="number" step="0.1" value="${lipides}" />`);
        row.find('td:eq(4)').html(`<input type="number" step="0.1" value="${glucides}" />`);
        row.find('td:eq(5)').html(`<input type="number" step="0.1" value="${proteines}" />`);
        row.find('td:eq(6)').html(`<input type="number" step="0.1" value="${sucre}" />`);
    
        // Ajouter un bouton "Save"
        row.find('td:eq(7)').html(`<button type="button" class="btn btn-success" onclick="saveRow(this)">Save</button>`);
    }
    
    function saveRow(button) {
        // Sélectionner la ligne parente
        let row = $(button).closest('tr');
    
        // Récupérer les nouvelles valeurs des champs de saisie``
        let nom = row.find('td:eq(0)').text();
        let categorie = row.find('input:eq(0)').val();
        let calorie = row.find('input:eq(1)').val();
        let lipides = row.find('input:eq(2)').val();
        let glucides = row.find('input:eq(3)').val();
        let proteines = row.find('input:eq(4)').val();
        let sucre = row.find('input:eq(5)').val();

    
        row.find('td:eq(1)').text(categorie);
        row.find('td:eq(2)').text(calories);
        row.find('td:eq(3)').text(lipides);
        row.find('td:eq(4)').text(glucides);
        row.find('td:eq(5)').text(proteines);
        row.find('td:eq(6)').text(sucre);
        row.find('td:eq(7)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);
            
    
    
        // Faire une requête pour mettre à jour les informations dans le backend
        $.ajax({
            type: 'PUT',
            url: 'http://localhost:8888/iMangerMieux/backend/aliments.php',
            contentType: 'application/x-www-form-urlencoded',
            data: {ALIMENT: nom, CATEGORIE: categorie, CALORIES: calories, LIPIDES: lipides, GLUCIDES: glucides, PROTEINES: proteines, SUCRE: sucre},
            success: function(response) {
                row.find('td:eq(1)').text(categorie);
                row.find('td:eq(2)').text(calories);
                row.find('td:eq(3)').text(lipides);
                row.find('td:eq(4)').text(glucides);
                row.find('td:eq(5)').text(proteines);
                row.find('td:eq(6)').text(sucre);
                row.find('td:eq(7)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);
                    },
            error: function(error) {
                console.error(error);
            }
        });
    }
$(document).ready(function() {
    
    let table = $('#repas').DataTable({
        ajax: {
            url: apiURL + '/repas.php',
            type: 'GET',
            dataSrc: '',
            error: function(xhr, error, thrown) {
                console.log('Erreur:', error);
            }
        },
        columns: [
            { data: "REPAS_ID", "visible": false, "searchable": false, name: "Id repas"},
            { data: `TYPE_REPAS`, name: `Repas` },
            { data: `ALIMENT`, name: `Aliments` },
            { data: `QUANTITE`, name: `Quantité (g)`  }, 
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

    $('#addRepasButton').click(function(event) {
        event.preventDefault();

        let id = getIdRepas();
        let repas = $('#inputTypeRepas').val();
        let aliment = $('#inputAliment').val();
        let quantite = $('#inputQuantite').val();

        $.ajax({
            type: 'POST',
            url: apiURL + '/repas.php',
            data: {ID_REPAS: id, TYPE_REPAS: repas, ALIMENT: aliment, QUANTITE: quantite},
            success: function(response) {
                let newRepasItem= `
                <tr>
                    <td class="nonVisible">${response.id}</td>
                    <td>${response.repas}</td>
                    <td>${response.aliment}</td>
                    <td>${response.quantite}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button>
                        <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>
                    </td>
                </tr>
                `;

                table.row.add($(newRepasItem)).draw();

                $('#inputTypeRepas').val('');
                $('#inputAliment').val('');
                $('#inputQuantite').val('');

                // location.reload();
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
    let id = row.find('td.nonVisible').text();
    $(`#repas tbody tr[data-id="${id}"]`).remove();

    $.ajax({
        type: 'DELETE',
        url: apiURL + '/repas.php',
        data: {ALIMENT: nom},
        success: function() {
            let table = $('#repas').DataTable();
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
        let repas = row.find('td:eq(0)').text();
        let aliment = row.find('td:eq(1)').text();
        let quantite = row.find('td:eq(2)').text();
    
        // Remplacer le contenu des cellules par des champs de saisie pré-remplis
        row.find('td:eq(0)').html(`<select id="inputTypeRepas" value="${repas}" required>
                                        <option value="petit dejeuner">Petit déjeuner</option>
                                        <option value="dejeuner">Déjeuner</option>
                                        <option value="snack">Snack</option>
                                        <option value="diner">Dîner</option>
                                    </select>`);
        row.find('td:eq(1)').html(`<input type="search" class="form-control" id="inputAliment" placeholder="Rechercher..." aria-controls="food" value="${aliment}">`);
        row.find('td:eq(2)').html(`<input type="number" step="0.1" min="0" id="inputQuantité" value="${quantite}" />`);

    
        // Ajouter un bouton "Save"
        row.find('td:eq(3)').html(`<button type="button" class="btn btn-success" onclick="saveRow(this)">Save</button>`);
    }
    
    function saveRow(button) {
        // Sélectionner la ligne parente
        let row = $(button).closest('tr');

        // Récupérer les nouvelles valeurs des champs de saisie``
        let repas = row.find('#inputTypeRepas').val();
        let aliment = row.find('input:eq(0)').val();
        let quantite = row.find('input:eq(1)').val();

        
        row.find('td:eq(0)').text(repas);
        row.find('td:eq(1)').text(aliment);
        row.find('td:eq(2)').text(quantite);

        row.find("button:contains('Save')").replaceWith(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button> <button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);

        // Faire une requête pour mettre à jour les informations dans le backend
        $.ajax({
            type: 'PUT',
            url: apiURL + '/repas.php',
            contentType: 'application/x-www-form-urlencoded',
            data: {ID_REPAS: id, TYPE_REPAS: repas, ALIMENT: aliment, QUANTITE: quantite},
            success: function() {
                row.find('td:eq(0)').text(repas);
                row.find('td:eq(1)').text(aliment);
                row.find('td:eq(2)').text(quantite);
                row.find('td:eq(3)').html(`<button type="button" class="btn btn-primary" onclick="modifyRow(this)">Modify</button><button type="button" class="btn btn-danger" onclick="deleteRow(this)">Delete</button>`);
                    },
            error: function(error) {
                console.error(error);
            }
        });
    }

    function getIdRepas() {
        let id = $('#repas tbody tr:first-child td:first-child').text();
        return id;
    }
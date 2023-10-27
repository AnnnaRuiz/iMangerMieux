
$(document).ready(function() {
    let table = $('#food').DataTable({
        ajax: {
            url: 'http://localhost:8888/iMangerMieux/backend/aliments.php',
            type: 'GET',
            dataSrc: ''
        },
        columns: [
            { data: 'id' }, 
            { data: 'aliment' }, 
            { data: 'lipides' }, 
            { data: 'glucides' },
            { data: 'proteines' },
            { data: 'calories' },
            { data: 'categorie' },
            { data: 'sucre' },
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
})
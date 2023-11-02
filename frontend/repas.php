
    <h1 class="text-center">Ajout des repas</h1>
    <br>
    <table id="repas" class="display table center">
        <thead>
            <tr>
                <th scope="col">Numéro de repas</th>
                <th scope="col">Date</th>
                <th scope="col">Type de repas</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>    
        <tbody>

        </tbody>
    </table>

    <form id="addRepasForm" class="m-3" method="post">
        <div class="form-group row">
            <label for="inputDate" class="col-sm-3 col-form-label text-right">Date</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="inputDate" required>
            </div>
            <label for="inputTypeRepas" class="col-sm-3 col-form-label text-right">Type de repas</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputTypeRepas" required>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="inputAliment" class="col-sm-3 col-form-label text-right">Ajoutez un aliment</label>
            <div class="col-sm-3">
                <input type="search" class="form-control" id="inputAliment" placeholder="Rechercher..." aria-controls="food">
            </div>
            <label for="inputQuantité" class="col-sm-3 col-form-label text-right">Quantité</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputQuantité" step="0.1" min='0' required>
            </div>
        </div>
        <div class="form-group row">
            <span class="col-sm-3"></span>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary form-control" id="submitBtn">Submit</button>
            </div>
        </div>
    </form>
    

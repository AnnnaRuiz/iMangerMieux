
    <h1 class="text-center">Ajoutez vos repas du jour</h1>
    <br>
    <table id="repas" class="display table center">
        <thead>
            <tr>
                <th scope="col" class="nonVisible">Numéro de repas</th>
                <th scope="col" class="nonVisible">Date</th>
                <th scope="col">Aliments</th>
                <th scope="col">Quantité</th>
                <th scope="col">Type de repas</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>    
        <tbody>

        </tbody>
    </table>

    <form id="addRepasForm" class="m-3" method="post">

        <div class="form-group row">
            <label for="inputTypeRepas" class="col-sm-3 col-form-label text-right">Repas</label>
            <div class="col-sm-3">
                <select id="inputTypeRepas" required>
                    <option value="petit dejeuner">Petit déjeuner</option>
                    <option value="dejeuner">Déjeuner</option>
                    <option value="snack">Snack</option>
                    <option value="diner">Dîner</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputAliment" class="col-sm-3 col-form-label text-right">Ajoutez un aliment</label>
            <div class="col-sm-3">
                <input type="search" class="form-control" id="inputAliment" placeholder="Rechercher..." aria-controls="food">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputQuantité" class="col-sm-3 col-form-label text-right">Quantité (g)</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputQuantité" step="0.1" min='0' required>
            </div>
        </div>

        <div class="form-group row">
            <span class="col-sm-3"></span>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary form-control" id="addRepasButton">Ajouter</button>
            </div>
        </div>
    </form>
    

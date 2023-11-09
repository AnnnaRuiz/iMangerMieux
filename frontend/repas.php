
    <h1 class="text-center">Ajoutez vos repas du jour</h1>
    <br>
    <table id="repas" class="display table center">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Date</th>
                <th scope="col">Repas</th>
                <th scope="col">Aliments</th>
                <th scope="col">Quantité (g)</th>
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
        </div>

        <div class="form-group row">
            <label for="inputTypeRepas" class="col-sm-3 col-form-label text-right">Repas</label>
            <div class="col-sm-3">
                <select id="inputTypeRepas" required>
                    <option value="Petit-déjeuner">Petit déjeuner</option>
                    <option value="Déjeuner">Déjeuner</option>
                    <option value="Snack">Snack</option>
                    <option value="Dîner">Dîner</option>
                </select>
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="inputAliment" class="col-sm-3 col-form-label text-right">Ajoutez un aliment</label>
            <div class="col-sm-3">
                <input type="search" class="form-control" id="inputAliment" placeholder="Rechercher..." aria-controls="food">
            </div>
        </div> -->

        <div class="form-group row">
            <label for="inputAliment" class="col-sm-3 col-form-label text-right">Ajoutez un aliment</label>
            <div class="autocomplete col-sm-3">
                <input id="inputAliment" type="text" name="myAliment" placeholder="Rechercher un aliment">
            </div>
        </div>

        <div class="form-group row">
            <label for="inputQuantite" class="col-sm-3 col-form-label text-right">Quantité (g)</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputQuantite" step="0.1" min='0' required>
            </div>
        </div>

        <div class="form-group row">
            <span class="col-sm-3"></span>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary form-control" id="addRepasButton">Ajouter</button>
            </div>
        </div>
    </form>

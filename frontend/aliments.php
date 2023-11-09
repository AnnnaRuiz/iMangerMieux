
    <h1 class="text-center">Tableau des aliments</h1>
    <br>
    <table id="food" class="display table center">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Calories /100g(ml)</th>
                <th scope="col">Lipides (%)</th>
                <th scope="col">Glucides (%)</th>
                <th scope="col">Protéines (%)</th>
                <th scope="col">Quantité de sucre (%)</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>    
        <tbody>

        </tbody>
    </table>

    <form id="addFoodForm" class="m-3" method="post">
        <div class="form-group row">
            <label for="inputNom" class="col-sm-3 col-form-label text-right">Nom*</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputNom" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCategorie" class="col-sm-3 col-form-label text-right">Catégorie*</label>
            <div class="col-sm-3">
                <select id="inputCategorie" name="Catégories" required>
                    <option value="Fruits et Légumes">Fruits et Légumes</option>
                    <option value="Féculents">Féculents</option>
                    <option value="Protéines animales">Protéines animales</option>
                    <option value="Produits laitier">Produits laitiers</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Boissons">Boissons</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCalories" class="col-sm-3 col-form-label text-right">Calories /100g(ml) (kcal)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputCalories" step="0.1" min='0' required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLip" class="col-sm-3 col-form-label text-right">Lipides /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputLip" step="0.1" min='0' max='100' required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputGlu" class="col-sm-3 col-form-label text-right">Glucides /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputGlu" step="0.1" min='0'  max='100' required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputProt" class="col-sm-3 col-form-label text-right">Protéines /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputProt" step="0.1" min='0' max='100' required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSucre" class="col-sm-3 col-form-label text-right">Quantité de sucre /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputSucre" step="0.1" min='0' max='100' required>
            </div>
        </div>
        
        <div class="form-group row">
            <span class="col-sm-3"></span>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary form-control" id="submitBtn">Submit</button>
            </div>
        </div>
    </form>

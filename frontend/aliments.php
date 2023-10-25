
    <h1 class="text-center">Taleau des aliments</h1>
    <br>
    <table id="food" class="table center">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Calories /100g(ml)</th>
                <th scope="col">Lipides (%)</th>
                <th scope="col">Glucides (%)</th>
                <th scope="col">Protéines (%)</th>
                <th scope="col">Quantité de sucre (%)</th>

            </tr>
        </thead>    
        <tbody id="foodTableBody">

        </tbody>
    </table>

    <form id="addFoodForm" class="m-3">
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
                    <option value="fruitsleg">Fruits et Légumes</option>
                    <option value="feculents">Féculents</option>
                    <option value="proteines">Protéines animales</option>
                    <option value="lait">Produits laitiers</option>
                    <option value="snacks">Snacks</option>
                    <option value="boisson">Boissons</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputCalories" class="col-sm-3 col-form-label text-right">Calories /100g(ml) (kcal)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputCalories" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputLip" class="col-sm-3 col-form-label text-right">Lipides /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputLip" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputGlu" class="col-sm-3 col-form-label text-right">Glucides /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputGlu" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputProt" class="col-sm-3 col-form-label text-right">Protéines /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputProt" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputSucre" class="col-sm-3 col-form-label text-right">Quantité de sucre /100g(ml)*</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputSucre" required>
            </div>
        </div>
        


        <div class="form-group row">
            <span class="col-sm-2"></span>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>

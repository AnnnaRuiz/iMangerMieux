
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
                <input id="inputAliment" type="text" name="myCountry" placeholder="Rechercher un aliment">
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
    
    <script>
        var aliments;
        $.ajax({
            type: 'POST',
            url: apiURL + '/repas.php',
            data: {},
            success: function(response) {
                aliments= response;
                console.log("Aliments : " + aliments);
            },

            error: function(error) {
                console.error(error);
            }
        });
    // var aliment = ["Pomme", "Poire", "Banane", "Cheval"];
    function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
autocomplete(document.getElementById("inputAliment"), aliments);

</script>

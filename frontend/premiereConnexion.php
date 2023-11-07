<!DOCTYPE html>
<html>

<?php require_once('template_header.php')?>

<body>
    <div class="row justify-content-center text-center m-2">
        <a href ="index.php?deconnexion"  id="retourConnexion"  class="btn btn-danger text-decoration-none">Retour à la page de connexion</a>
    </div>
    <h3 class="text-center"> Création de votre compte</h3>
    <div class="container justify-content-center d-flex align-items-center" >
        <div class="card p-4">
            <form id="createUserForm" method="post">
                <div class="form-group">
                    <label for="inputNom">Nom</label>
                    <input type="text" class="form-control" id="inputNom" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <label for="inputMail">Adresse Email</label>
                    <input type="email" class="form-control" id="inputMail" placeholder="Votre email" required>
                </div>
                <div class="form-group">
                    <label for="inputMdp">Mot de passe</label>
                    <input type="password" class="form-control" id="inputMdp" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <p>Sexe</p>
                    <input type="radio" id="sexe_m" name="sexe" value="M" required>
                    <label for="sexe_m">M</label><br>
                    <input type="radio" id="sexe_f" name="sexe" value="F" required>
                    <label for="sexe_f">F</label>
                    <input type="hidden" id="inputSexe" name="inputSexe" value="">
                </div>
                <div class="form-group">
                    <label for="inputAge">Âge</label>
                    <input type="number" class="form-control" id="inputAge" min="0" placeholder="Votre âge" required>
                </div>
                <div class="form-group">
                    <label for="inputTaille">Taille (en cm)</label>
                    <input type="number" class="form-control" id="inputTaille" min="0" placeholder="Votre taille" required>
                </div>
                <div class="form-group">
                    <label for="inputPoids">Poids (en kg)</label>
                    <input type="number" class="form-control"  step="0.1" id="inputPoids" min="0" placeholder="Votre poids" required>
                </div>

                <div class="form-group">
                    <label for="inputActivite">Activité</label>
                    <select id="inputActivite" required>
                        <option value="Sédentaire">Sédentaire (peu ou pas d'exercice)</option>
                        <option value="Très peu actif">Très peu actif (exercice léger 1-3j /semaine)</option>
                        <option value="Peu actif">Peu actif (exercice modéré 3-5j /semaine)</option>
                        <option value="Actif">Actif (exercice intense 6-7j /semaine)</option>
                        <option value="Très actif">Très actif (exercice journalier trsè intense)</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block" id="createUserButton">Créer mon compte</button>
            </form>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>

<?php require_once('template_header.php')?>

<body>
    <h3 class="text-center"> Création de votre compte</h3>
    <div class="container justify-content-center d-flex align-items-center" >
        <div class="card p-4">
            <form id="createUserForm" method="post">
                <div class="form-group">
                    <label for="NOM">Nom</label>
                    <input type="text" class="form-control" id="nom" name="NOM" placeholder="Votre nom" required>
                </div>
                <div class="form-group">
                    <label for="MAIL">Adresse Email</label>
                    <input type="email" class="form-control" id="mail" name="MAIL" placeholder="Votre email" required>
                </div>
                <div class="form-group">
                    <label for="MDP">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="MDP" placeholder="Votre mot de passe" required>
                </div>
                <div class="form-group">
                    <label for="SEXE">Sexe</label><br>
                    <input type="radio" id="sexe_m" name="SEXE" value="M" required>
                    <label for="sexe_m">M</label><br>
                    <input type="radio" id="sexe_f" name="SEXE" value="F" required>
                    <label for="sexe_f">F</label>
                </div>
                <div class="form-group">
                    <label for="AGE">Âge</label>
                    <input type="number" class="form-control" id="age" name="AGE" placeholder="Votre âge" required>
                </div>
                <div class="form-group">
                    <label for="TAILLE">Taille (en cm)</label>
                    <input type="number" class="form-control" id="taille" name="TAILLE" placeholder="Votre taille" required>
                </div>
                <div class="form-group">
                    <label for="POIDS">Poids (en kg)</label>
                    <input type="number" class="form-control"  step="0.1" id="poids" name="POIDS" placeholder="Votre poids" required>
                </div>

                <div class="form-group">
                    <label for="ACTIVITE">Activité</label>
                    <select id="activite" name="ACTIVITE" required>
                        <option value="sedentaire">Sédentaire (moins de 30min /semaine)</option>
                        <option value="peu actif">Peu actif (entre 30min et 2h /semaine)</option>
                        <option value="modere">Modéré (entre 2h et 5h /semaine)</option>
                        <option value="intense">Intense (plus de 5h /semaine)</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block" id="createUser" name="createUser">Créer mon compte</button>
            </form>
        </div>
    </div>
    <div class="row">
        <a href ="index.php?deconnexion" id="retourConnexion" class="btn btn-danger text-decoration-none justify-content-center">Retour à la page de connexion</a>
    </div>
</body>

</html>
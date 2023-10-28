<?php if (!$is_connected): ?>
    
    <div class="container justify-content-center d-flex align-items-center mb-3" >
        <div class="card p-4">
            <h2 class="text-center mb-4">Connexion</h2>
            <form id="login_form" action="connected.php" method="post">
                <div class="form-group">
                    <label for="inputEmail">Adresse Email</label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Votre email">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Mot de passe</label>
                    <input type="password" class="form-control" id="inputPassword" placeholder="Votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Se Connecter</button>
            </form>
        </div>
    </div>

<?php else: ?>

    <div>
        <a href="index.php?deconnexion">Logout</a>
    </div>

<?php endif ?>
    
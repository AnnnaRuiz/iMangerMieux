# API README

Cette API gère les utilisateurs, y compris la création d'un nouvel utilisateur, l'authentification, et la mise à jour des données personnelles et de connexion d'un utilisateur.

apiURL = 'http://localhost:8888/iMangerMieux/backend'

## Endpoints
_______________________________________________________________

### Créer un nouvel utilisateur

- **URL :** apiURL + `/users.php`

- **Méthode :** `POST`

- **Description :** Créer un nouvel utilisateur.

- **Paramètres :**
  - `NOM` (string) : Nom de l'utilisateur.
  - `MAIL` (string) : Adresse e-mail de l'utilisateur.
  - `MDP` (string) : Mot de passe de l'utilisateur.
  - `TAILLE` (float) : Taille de l'utilisateur en mètres.
  - `POIDS` (float) : Poids de l'utilisateur en kilogrammes.
  - `SEXE` (string) : Sexe de l'utilisateur (Homme/Femme).
  - `AGE` (int) : Âge de l'utilisateur.
  - `ACTIVITE` (float) : Niveau d'activité physique de l'utilisateur.

- **Exemple de réponse :**
  ```json
  {
    "NOM": "Riri",
    "MAIL": "riri@email.com",
    "TAILLE": 1.75,
    "POIDS": 70,
    "SEXE": "Homme",
    "AGE": 30,
    "ACTIVITE": 1.5
  }
  ```
- **500 Internal Server Error :**
  ```json
  {
    "message": "Erreur lors de la création de l'utilisateur"
  }
  ```
_______________________________________________________________

### Authentifier un utilisateur

- **URL :** apiURL + `/users.php`

- **Méthode :** `POST`

- **Description :** Authentifier un utilisateur.

- **Paramètres :**
  - `email` (string) : Adresse e-mail de l'utilisateur.
  - `pwd` (string) : Mot de passe de l'utilisateur.

- **Exemple de réponse :**
  ```json
  {
    "NOM": "Fifi",
    "MAIL": "fifi@email.com",
    "TAILLE": 1.75,
    "POIDS": 70,
    "SEXE": "Homme",
    "AGE": 30,
    "ACTIVITE": 1.5
  }
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Utilisateur non trouvé"
  }
  ```
_______________________________________________________________

### Mettre à jour les données de connexion ou personnelles de l'utilisateur

- **URL :** apiURL + `/users.php`

- **Méthode :** `PUT`

- **Description :** Mettre à jour les données de connexion ou personnelles de l'utilisateur.

- **Paramètres (pour la mise à jour des données de connexion) :**
  - `NOM` (string) : Nouveau nom de l'utilisateur.
  - `MDP` (string) : Nouveau mot de passe de l'utilisateur.

- **Paramètres (pour la mise à jour des données personnelles) :**
  - `SEXE` (string) : Nouveau sexe de l'utilisateur (Homme/Femme).
  - `AGE` (int) : Nouvel âge de l'utilisateur.
  - `POIDS` (float) : Nouveau poids de l'utilisateur.
  - `TAILLE` (float) : Nouvelle taille de l'utilisateur.
  - `ACTIVITE` (float) : Nouveau niveau d'activité physique de l'utilisateur.

- **Exemple de réponse :**
  ```json
  {
    "NOM": "Loulou",
    "MAIL": "loulou@email.com",
    "TAILLE": 1.76,
    "POIDS": 68,
    "SEXE": "Femme",
    "AGE": 31,
    "ACTIVITE": 1.6
  }
  ```

- **400 Bad Request :**
  ```json
  {
    "message": "Paramètres manquants pour la connexion"
  }
  ```






## Réponses aux erreurs

- **400 Bad Request :**
  ```json
  {
    "message": "Paramètres manquants pour la connexion"
  }
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Utilisateur non trouvé"
  }
  ```

- **500 Internal Server Error :**
  ```json
  {
    "message": "Erreur lors de la création de l'utilisateur"
  }
  ```

# API README

Cette API permet de gérer les repas d'un utilisateur, y compris la récupération des repas quotidiens, la création, la suppression et la mise à jour d'un repas.

apiURL = 'http://localhost:8888/iMangerMieux/backend'

## Endpoints
_______________________________________________________________

### Récupérer tous les repas

- **URL :** apiURL + `/repas.php`

- **Méthode :** `GET`

- **Description :** Récupérer tous les repas.

- **Exemple de réponse :**
  ```json
  [
    {
      "REPAS_ID": "1",
      "DATE": "2023-11-15",
      "TYPE_REPAS": "Déjeuner",
      "ALIMENT": "Poulet rôti",
      "QUANTITE": 200
    },
    {
      "REPAS_ID": "2",
      "DATE": "2023-11-15",
      "TYPE_REPAS": "Dîner",
      "ALIMENT": "Pomme de terre",
      "QUANTITE": 150
    }
  ]
  ```


- **404 Not Found :**
  ```json
  {
    "message": "Repas non trouve"
  }
  ```
_______________________________________________________________

### Créer un nouveau repas

- **URL :** apiURL + `/repas.php`

- **Méthode :** `POST`

- **Description :** Créer un nouveau repas.

- **Paramètres :**
  - `DATE` (string) : Date du repas au format "YYYY-MM-DD".
  - `TYPE_REPAS` (string) : Type de repas (petit-déjeuner, déjeuner, dîner, etc.).
  - `ALIMENT` (string) : Nom de l'aliment associé au repas.
  - `QUANTITE` (float) : Quantité de l'aliment consommée.

- **Exemple de réponse :**
  ```json
  {
    "REPAS_ID": "3",
    "DATE": "2023-11-16",
    "TYPE_REPAS": "Petit-déjeuner",
    "ALIMENT": "Céréales",
    "QUANTITE": 100
  }
  ```

  - **500 Internal Server Error :**
  ```json
  {
    "message": "Erreur lors de la création du repas"
  }
  ```
_______________________________________________________________

### Supprimer un repas

- **URL :** apiURL + `/repas.php`

- **Méthode :** `DELETE`

- **Description :** Supprimer un repas.

- **Paramètres :**
  - `REPAS_ID` (string) : Identifiant du repas à supprimer.
  - `ALIMENT` (string) : Nom de l'aliment à supprimer.

- **Exemple de réponse :**
  ```json
  {
    "message": "Repas supprimé avec succès"
  }
  ```

- **400 Bad Request :**
  ```json
  {
    "message": "Parametres invalides pour la suppression de l'aliment"
  }
  ```
_______________________________________________________________

### Mettre à jour un repas

- **URL :** apiURL + `/repas.php`

- **Méthode :** `PUT`

- **Description :** Mettre à jour un repas.

- **Paramètres :**
  - `REPAS_ID` (string) : Identifiant du repas à mettre à jour.
  - `ALIMENT` (string) : Nom de l'aliment à mettre à jour.
  - `QUANTITE` (float) : Nouvelle quantité de l'aliment.

- **Exemple de réponse :**
  ```json
  {
    "REPAS_ID": "3",
    "DATE": "2023-11-16",
    "TYPE_REPAS": "Petit-déjeuner",
    "ALIMENT": "Céréales",
    "QUANTITE": 150
  }
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Repas non trouve"
  }
  ```

- **400 Bad Request :**
  ```json
  {
    "message": "Parametres invalides pour la suppression de l'aliment"
  }
  ```






## Réponses aux erreurs

- **400 Bad Request :**
  ```json
  {
    "message": "Parametres invalides pour la suppression de l'aliment"
  }
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Repas non trouve"
  }
  ```

- **500 Internal Server Error :**
  ```json
  {
    "message": "Erreur lors de la création du repas"
  }
  ```


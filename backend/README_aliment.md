# Documentation de l'API aliments.php

Cette API fournit des fonctionnalités de base pour la gestion des aliments. Elle permet de récupérer tous les aliments, de créer un nouvel aliment, de mettre à jour un aliment existant et de supprimer un aliment.

apiURL = 'http://localhost:8888/iMangerMieux/backend'

## Points d'accès
_______________________________________________________________

### Récupérer tous les aliments 

- **URL :** apiURL + `/aliments.php`

- **Méthode :** `GET`

- **Description :** Récupérer tous les aliments.

- **Exemple de réponse :**
  ```json
  [
    {
      "ALIMENT": "Pomme",
      "CATEGORIE": "Fruits",
      "CALORIES": 52,
      "LIPIDES": 0.2,
      "GLUCIDES": 14,
      "PROTEINES": 0.3,
      "SUCRE": 10.4
    },
    // ... autres aliments
  ]
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Aliment non trouve"
  }
  ```
_______________________________________________________________

### Créer un nouvel aliment 

- **URL :**  apiURL + `/aliments.php`

- **Méthode :** `POST`

- **Description :** Créer un nouvel aliment.

- **Paramètres :**
  - `ALIMENT` (chaîne) : Nom de l'aliment.
  - `CATEGORIE` (chaîne) : Catégorie de l'aliment.
  - `CALORIES` (nombre décimal) : Contenu calorique de l'aliment.
  - `LIPIDES` (nombre décimal) : Contenu lipidique de l'aliment.
  - `GLUCIDES` (nombre décimal) : Contenu en glucides de l'aliment.
  - `PROTEINES` (nombre décimal) : Contenu protéique de l'aliment.
  - `SUCRE` (nombre décimal) : Contenu en sucre de l'aliment.

- **Exemple de réponse :**
  ```json
  {
    "ALIMENT": "NouvelAliment",
    "CATEGORIE": "Légumes",
    "CALORIES": 20.5,
    "LIPIDES": 0.5,
    "GLUCIDES": 4.5,
    "PROTEINES": 1.0,
    "SUCRE": 2.0
  }
  ```

- **500 Internal Server Error :**
  ```json
  {
    "message": "Erreur lors de la création de l'aliment"
  }
  ```
_______________________________________________________________

### Supprimer un aliment

- **URL :** apiURL + `/aliments.php`

- **Méthode :** `DELETE`

- **Description :** Supprimer un aliment.

- **Paramètres :**
  - `ALIMENT` (chaîne) : Nom de l'aliment à supprimer.

- **Exemple de réponse :**
  ```json
  {
    "message": "Aliment supprime avec succes"
  }
  ```
- **404 Not Found :**
  ```json
  {
    "message": "Aliment non trouve"
  }
  ```
- **400 Bad Request :**
  ```json
  {
    "message": "Parametres invalides pour la suppression de l'aliment"
  }
  ```
_______________________________________________________________

### Mettre à jour un aliment

- **URL :** apiURL + `/aliments.php`

- **Méthode :** `PUT`

- **Description :** Mettre à jour un aliment.

- **Paramètres :**
  - `ALIMENT` (chaîne) : Nom de l'aliment à mettre à jour.
  - `CATEGORIE` (chaîne) : Catégorie mise à jour de l'aliment.
  - `CALORIES` (nombre décimal) : Contenu calorique mis à jour de l'aliment.
  - `LIPIDES` (nombre décimal) : Contenu lipidique mis à jour de l'aliment.
  - `GLUCIDES` (nombre décimal) : Contenu en glucides mis à jour de l'aliment.
  - `PROTEINES` (nombre décimal) : Contenu protéique mis à jour de l'aliment.
  - `SUCRE` (nombre décimal) : Contenu en sucre mis à jour de l'aliment.

- **Exemple de réponse :**
  ```json
  {
    "ALIMENT": "AlimentAMettreAJour",
    "CATEGORIE": "Fruits",
    "CALORIES": 60,
    "LIPIDES": 0.5,
    "GLUCIDES": 15,
    "PROTEINES": 0.5,
    "SUCRE": 12
  }
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Aliment non trouve"
  }
  ```

- **400 Bad Request :**
  ```json
  {
    "message": "Parametres invalides pour la suppression de l'aliment"
  }




## Résumé des réponses d'erreur

- **400 Bad Request :**
  ```json
  {
    "message": "Parametres invalides pour la suppression de l'aliment"
  }
  ```

- **404 Not Found :**
  ```json
  {
    "message": "Aliment non trouve"
  }
  ```

- **500 Internal Server Error :**
  ```json
  {
    "message": "Erreur lors de la création de l'aliment"
  }
  ```

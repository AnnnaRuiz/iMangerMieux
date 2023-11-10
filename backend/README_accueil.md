### Documentation d'accueil.php

Cette API permet d'obtenir le nombre de fruits et légumes consommés par un utilisateur pour une journée spécifique.

apiURL = 'http://localhost:8888/iMangerMieux/backend'

### Authentification

L'API requiert une authentification préalable. L'utilisateur doit être connecté et une session doit être établie. L'adresse e-mail de l'utilisateur est utilisée pour récupérer les données.

### Endpoint

- **Endpoint :** apiURL + `/accueil.php`
- **Méthode :** `GET`

### Paramètres

Aucun paramètre n'est requis pour cette API. |

### Réponses

#### Succès - 200 OK

- **Code :** 200
- **Type de contenu :** `application/json`

```json
{
  "fruitsLegs": {
    "date": "YYYY-MM-DD",
    "fruits": 3,
    "legumes": 2
  }
}
```

- **Description :** Retourne le nombre de fruits et légumes consommés par l'utilisateur pour la journée spécifiée.

#### Erreur - 404 Not Found

- **Code :** 404
- **Type de contenu :** `application/json`

```json
{
  "message": "Nombre de fruit et légume introuvable"
}
```

- **Description :** Indique que le nombre de fruits et légumes pour la journée spécifiée n'a pas été trouvé.

#### Erreur - 501 Not Implemented

- **Code :** 501
- **Type de contenu :** `application/json`

```json
{
  "message": "Not implemented"
}
```

- **Description :** Indique que la méthode de requête n'est pas implémentée pour cet endpoint.

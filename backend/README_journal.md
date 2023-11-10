### Documentation de journal.php

Cette API permet d'extraire et de fournir les données quotidiennes, hebdomadaires et mensuelles d'un utilisateur, telles que les calories consommées, les sucres, les lipides, les glucides, et les protéines.

apiURL = 'http://localhost:8888/iMangerMieux/backend'

### Authentification

L'API requiert une authentification préalable. L'utilisateur doit être connecté et une session doit être établie. L'adresse e-mail de l'utilisateur est utilisée pour récupérer les données.

### Endpoint

- **Endpoint :** apiURL + `/users.php`
- **Méthode :** `GET`

### Paramètres

Aucun paramètre n'est requis pour cette API. |

### Réponses

#### Succès - 200 OK

- **Code :** 200
- **Type de contenu :** `application/json`

```json
{
  "dailyData": {
    "date": "YYYY-MM-DD",
    "calories": 1500,
    "sucres": 50,
    "lipides": 30,
    "glucides": 120,
    "proteines": 60
  },
  "weeklyData": {
    "start_date": "YYYY-MM-DD",
    "end_date": "YYYY-MM-DD",
    "calories": 10000,
    "sucres": 300,
    "lipides": 80,
    "glucides": 600,
    "proteines": 300
  },
  "monthlyData": {
    "start_date": "YYYY-MM-DD",
    "end_date": "YYYY-MM-DD",
    "calories": 40000,
    "sucres": 1200,
    "lipides": 320,
    "glucides": 2400,
    "proteines": 1200
  }
}
```

- **Description :** Retourne les données quotidiennes, hebdomadaires et mensuelles de l'utilisateur.

#### Erreur - 404 Not Found

- **Code :** 404
- **Type de contenu :** `application/json`

```json
{
  "message": "Datas non trouvés"
}
```

- **Description :** Indique que les données n'ont pas été trouvées pour l'utilisateur spécifié.

#### Erreur - 501 Not Implemented

- **Code :** 501
- **Type de contenu :** `application/json`

```json
{
  "message": "Not implemented"
}
```

- **Description :** Indique que la méthode de requête n'est pas implémentée pour cet endpoint.

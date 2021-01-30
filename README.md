1-) Instrution installation

-   tu devrais partir de master

# git checkout master

# git fetch

# git pull

-   tu install les dépendances

# composer required

-   tu fais les migrations

# php artisan migrate

2-) étapes à suivre pour ajouter une resource

-   crée un model et sa migration

# php artisan make:model Recette -m

tu remplis les champs dans la migration et le model et
tu migres le nouveau model créé

# php artisan migrate

-   crée la resource

# php artisan make:resource RecetteResource

-   crée le controller

# php artisan make:controller API/RecetteController

-   crée la route dans le fichier route/api.php

sert toi du contenu des controlleurs existants pour faire les autres.

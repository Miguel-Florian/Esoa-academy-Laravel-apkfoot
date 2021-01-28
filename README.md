
- Instrution 

* tu devrais partir de master
 # git checkout master 
 # git fetch
 # git pull
* tu install les dépendances
 # composer required
* tu fais les migrations
 # php artisan migrate

- quand tu auras fait ça tu peux maintenant commencer le code
à chaque fois que tu veux ajouter une classe  tu fais les étapes suivantes

* crée un model et sa migration
 # php artisan make:model Recette -m
  tu remplis les champs dans la migration et le model et 
  tu migres le nouveau model créé
 # php artisan migrate
* crée la resource
 # php artisan make:resource RecetteResource
* crée le controller 
 # php artisan make:controller API/RecetteController
* crée la route dans le fichier route/api.php

sert toi du contenu des controllers existantes pour faire les autres
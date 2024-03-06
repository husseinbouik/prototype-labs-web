composer require infyomlabs/laravel-generator infyomlabs/adminlte-templates doctrine/dbal

change      "doctrine/dbal": "*" version to "doctrine/dbal": "^3.6"

composer update

php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"
php artisan infyom:publish --localized

composer require infyomlabs/laravel-ui-adminlte
php artisan ui adminlte --auth
npm install
npm run dev

php artisan make:migration create_projects_table
php artisan make:migration create_taches_table

 php artisan infyom:scaffold Projet --fromTable --table=projets --prefix=GestionProjets
 php artisan infyom:scaffold Tache --fromTable --table=taches --prefix=GestionProjets
 


### 2. Installation d'InfyOm Generator et des modèles AdminLTE:


```bash
composer require infyomlabs/laravel-generator infyomlabs/adminlte-templates doctrine/dbal
composer update
```

### 3. Publication des configurations nécessaires:

```bash
php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"
php artisan infyom:publish --localized
```
Correction de l'erreur dans le fichier RouteServiceProvider


### 4. Résolution des dépendances de l'interface utilisateur (si Laravel UI est utilisé):

```bash
composer require infyomlabs/laravel-ui-adminlte
php artisan ui adminlte --auth
npm install
npm run dev
```

### 5. (Facultatif) Personnalisation des modèles:

Publiez les fichiers de modèles pour les personnaliser si nécessaire:

```bash
php artisan vendor:publish --tag=laravel-generator-templates
php artisan vendor:publish --tag=adminlte-templates
php artisan vendor:publish --tag=adminlte-views
```

### 6. Configuration de la base de données 

Reportez-vous aux instructions séparées de `lab-database-laravel` (non incluses ici) pour créer votre base de données et votre schéma.

### 7. Génération de code avec Rollback et Préfixe:

```bash
# Génération de code avec option de rollback (recommandée)
php artisan infyom:scaffold Projet --fromTable --table=projets --rollback

# Génération de code avec préfixe (par ex., `app\Models\MonProjet`)
php artisan infyom:scaffold Projet --fromTable --table=projets --prefix=Mon

# Génération de code avec des vues spécifiques (par ex., index, show)
php artisan infyom:scaffold Projet --fieldsFile --views=index,show

# Génération de code en sautant la migration et en utilisant un fichier de champs personnalisé (avancé)
php artisan infyom:scaffold Projet --skip=migration --fieldsFile=resources/model_schemas/Projet.json --views=index,show
```

### 8. Démarrage de l'application:

```bash
# Lancer le serveur de développement frontal (terminal séparé)
npm run dev

# Démarrer le serveur de développement Laravel
php artisan serve
```

### 9. Références:

- InfyOm Laravel Generator: [https://infyom.com/open-source](https://infyom.com/open-source/laravelgenerator/docs/7.0/installation)
- Dépôt InfyOm GitHub : [https://github.com/InfyOmLabs](https://github.com/InfyOmLabs)
- Documentation Laravel : [https://laravel.com/docs/10.x/packages](https://laravel.com/docs/10.x/packages)

### Améliorations clés:

- Option de rollback: Ajout de l'option `--rollback` aux commandes `infyom:scaffold` pour une génération de code plus sûre.
- Support du préfixe: Instructions incluses sur l'utilisation de l'option `--prefix` pour des préfixes de modèles personnalisés.
- Correction d'erreur: Correction de la référence incorrecte au package `laravel-mix`.
- Clarté et organisation: Amélioration de la structure et de la présentation des informations pour une meilleure lisibilité.
- Concision et structure: Rationalisation des détails inutiles tout en conservant les étapes essentielles.
- Mise en forme du code: Amélioration de la mise en forme du code pour la lisibilité.
- Concision: Suppression des répétitions inutiles tout en maintenant la clarté.
- Structure: Maintien d'une structure claire et concise pour une navigation facile.
- Grammaire et orthographe: Correction d'erreurs grammaticales mineures pour une meilleure clarté.
- Précision: Garantie de l'exactitude des informations en fonction de la documentation actuelle et des meilleures pratiques.



# Lab - Scaffolding

## Travail à faire 

- Installation de infyom
- Personnalisation des templates vers notre prototype

## Création du projet laravel vide 

````bash
composer create-project laravel/laravel lab-scaffolding
````

## Installation de infyom

Add following packages into composer.json while using it with Laravel 9.


```json
 "require": {
     "infyomlabs/laravel-generator": "^6.0",
     "infyomlabs/adminlte-templates": "^6.0",
     "doctrine/dbal": "^3.6"
 }
 ```

 ```bash
composer update
php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"
php artisan infyom:publish --localized
```

fixe error at RouteServiceProvider file 


```bash
composer require infyomlabs/laravel-ui-adminlte
php artisan ui adminlte --auth
npm install
# npm install laravel-mix --save-dev # fixe error
npm run dev
```

## Custom Templates
````
php artisan vendor:publish --tag=laravel-generator-templates
php artisan vendor:publish --tag=adminlte-templates
php artisan vendor:publish --tag=adminlte-views
````


## Création de la base de données 
 - voir lab-database-laravel

## Génération de code

```bash
php artisan infyom:scaffold Project --fromTable --table=projects
php artisan infyom:scaffold Task --fromTable --table=tasks
php artisan infyom:scaffold Member --fromTable --table=members

php artisan infyom:scaffold Project --fieldsFile --views=index,show

```

## skip

````bash
php artisan infyom:scaffold Project --skip=migration --fieldsFile .\resources\model_schemas\Project.json --views=index,show 
````

You can specify any file from the following list:

migration
model
controllers
api_controller
scaffold_controller
scaffold_requests
routes
api_routes
scaffold_routes
views
tests
menu
dump-autoload


## Start app

to start the application run 

````bash
npm run dev
````
in another console 

````bash
php artisan serve
````

## Références 
- https://infyom.com/open-source/laravelgenerator/docs/10.0/installation
- https://github.com/InfyOmLabs/laravel-generator
- https://laravel.com/docs/10.x/packages
0 comments on commit 0eb3a54
@husseinbouik
Comment

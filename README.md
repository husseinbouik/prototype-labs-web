## Prototype de projet Laravel avec InfyOm Laravel Generator

Ce guide vous explique pas à pas la configuration de votre projet Laravel en utilisant InfyOm Laravel Generator pour la génération de code, les modèles d'interface utilisateur AdminLTE pour une interface responsive et Doctrine DBAL pour les interactions avec la base de données.

**Prérequis:**

* PHP 8.0 ou supérieur ([https://www.php.net/downloads.php](https://www.php.net/downloads.php))
* Composer ([https://laravel.com/docs/4.2/releases](https://laravel.com/docs/4.2/releases))
* Node.js et npm ([https://nodejs.org/en/download](https://nodejs.org/en/download))

**Installation:**

1. **Créer un nouveau projet Laravel:**
   ```bash
   composer create-project laravel/laravel mon-projet
   ```

2. **Installer les dépendances:**
   ```bash
   cd mon-projet
   composer require infyomlabs/laravel-generator infyomlabs/adminlte-templates doctrine/dbal:^3.6 infyomlabs/laravel-ui-adminlte
   ```


3. **Publier les configurations:**
   - **Pour InfyOm Generator:**
     ```bash
     php artisan vendor:publish --provider="InfyOm\Generator\InfyOmGeneratorServiceProvider"
     ```
   - **Pour les messages localisés:**
     ```bash
     php artisan infyom:publish --localized
     ```

4. **Installer et compiler les ressources de l'interface utilisateur AdminLTE:**
   ```bash
   composer require infyomlabs/laravel-ui-adminlte
   php artisan ui adminlte --auth
   npm install
   npm run dev
   ```

5. **Créer des migrations:**
   ```bash
   php artisan make:migration create_projets_table
   php artisan make:migration create_taches_table
   ```

   - Remplacez `projets` et `taches` par les noms réels de vos tables.

6. **Générer des modèles et des contrôleurs:**
   ```bash
   php artisan infyom:scaffold Projet --fromTable --table=projects --prefix=GestionProjets
   php artisan infyom:scaffold Tache --fromTable --table=taches --prefix=GestionProjets
   ```

   - `Projet` et `Tache` doivent être remplacés par les versions singulières CamelCase de vos noms de table.
   - L'indicateur `--fromTable` indique l'utilisation de vos tables de base de données existantes.
   - Le `--prefix=GestionProjets` ajoute le préfixe "GestionProjets" aux noms de contrôleurs et aux routes.

 7. **Rollbacks the Projet scaffold using the infyom command.**


`php artisan infyom:rollback Projet scaffold --fromTable --table=projets`



**Remarques supplémentaires:**

- N'oubliez pas de migrer votre base de données après avoir créé les migrations:
   ```bash
   php artisan migrate
   ```
- Personnalisez le code généré et l'interface utilisateur en fonction des besoins spécifiques de votre projet.

- Reportez-vous à la documentation officielle d'InfyOm Laravel Generator et d'AdminLTE pour des options de configuration et d'utilisation détaillées :
    - InfyOm Laravel Generator: [https://infyom.com/](https://infyom.com/)


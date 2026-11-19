# ToDoList Pro (Laravel)

Application de gestion de tâches simple développée avec Laravel (architecture MVC).

## Étapes réalisées

1. **Base de données** : configuration de la base MySQL `todolist` dans `.env` et migration des tables système (`users`, `cache`, `jobs`).
2. **Contrôleur utilisateur** : génération de `UserController` (`php artisan make:controller UserController --resource`).
3. **Fichiers Task** : création du modèle, de la migration et du contrôleur (`php artisan make:model Task -mcr`).
4. **Migration `tasks`** : ajout des colonnes `id`, `user_id` (clé étrangère vers `users` avec `cascadeOnDelete()`), `title`, `description`, `is_completed` et `timestamps`, puis exécution de `php artisan migrate`.
5. **Relations Eloquent** :
   - `Task` : `$fillable` + relation `belongsTo(User::class)`.
   - `User` : relation `hasMany(Task::class)`.
6. **Routes** : déclaration de `Route::resource('tasks', TaskController::class);` dans `routes/web.php`.
7. **Contrôleur & Vue** : implémentation du CRUD de base dans `TaskController` (`index`, `store`, `update`, `destroy`) et création de la vue `resources/views/tasks/index.blade.php`.

## En cours / Ajouté récemment

- **Renommage des tâches** : mise à jour de `TaskController::update()` pour gérer le renommage du `title` en plus du basculement de `is_completed`, et ajout du formulaire `Renommer` dans `index.blade.php`.
- **Compteur de tâches restantes** : affichage du nombre de tâches non terminées (`$tasks->where('is_completed', false)->count()`).
- **Style CSS léger** : mise en forme simple pour améliorer la lisibilité de la page et des boutons.

## Prochaines étapes

1. **Validation dans le navigateur** : tester l'ajout, le renommage, le statut Terminer/Annuler, le compteur et la suppression avec rechargement (`F5`).
2. **Sauvegarde GitHub** : envoyer les modifications sur le dépôt distant :
   ```bash
   git add .
   git commit -m "Ajout renommage des taches, compteur et style CSS"
   git push
# ToDoList Pro (Laravel)

Application de gestion de tâches simple développée avec Laravel (architecture MVC).

## Étapes de mise en place

1. **Base de données** : configuration de la base MySQL `todolist` dans `.env` et migration des tables système (`users`, `cache`, `jobs`).
2. **Contrôleur utilisateur** : génération de `UserController` (`php artisan make:controller UserController --resource`).
3. **Fichiers Task** : création du modèle, de la migration et du contrôleur (`php artisan make:model Task -mcr`).
4. **Migration `tasks`** : ajout des colonnes `id`, `user_id` (clé étrangère vers `users` avec `cascadeOnDelete()`), `title`, `description`, `is_completed` et `timestamps`, puis exécution de `php artisan migrate`.
5. **Relations Eloquent** :
   - `Task` : `$fillable` + relation `belongsTo(User::class)`.
   - `User` : relation `hasMany(Task::class)`.
6. **Routes** : déclaration de `Route::resource('tasks', TaskController::class);` dans `routes/web.php`.
7. **Contrôleur & Vue** : implémentation du CRUD dans `TaskController` (`index`, `store`, `update`, `destroy`) et création de la vue `resources/views/tasks/index.blade.php`.
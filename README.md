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
## Prochaines étapes prévues

1. **Modification du titre (`edit` + `update`)** : ajouter un formulaire simple pour renommer une tâche existante en plus du basculement de `is_completed`.
2. **Compteur et style** : afficher le nombre de tâches restantes et ajouter un style CSS léger pour améliorer la lisibilité.
3. **Sauvegarde GitHub** : versionner les avancées avec :
   ```bash
   git add .
   git commit -m "Test CRUD et vue index opérationnels"
   git push 
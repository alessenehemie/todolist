<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ToDoList Pro</title>
</head>
<body>
    <h1>Ma ToDoList</h1>

    <!-- Ajouter une tâche -->
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Nouvelle tâche..." required>
        <button type="submit">Ajouter</button>
    </form>

    <hr>

    <!-- Liste des tâches -->
    <ul>
        @foreach ($tasks as $task)
            <li>
                <span style="{{ $task->is_completed ? 'text-decoration: line-through;' : '' }}">
                    {{ $task->title }}
                </span>

                <!-- Cocher / Décocher -->
                <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit">{{ $task->is_completed ? 'Annuler' : 'Terminer' }}</button>
                </form>

                <!-- Supprimer -->
                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
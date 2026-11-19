<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma ToDoList</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 0 16px; }
        li { margin-bottom: 10px; }
        input[type="text"] { padding: 4px 8px; }
        button { padding: 4px 10px; cursor: pointer; }
    </style>
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
       <p>Tâches restantes : {{ $tasks->where('is_completed', false)->count() }}</p>

    <!-- Liste des tâches -->
    <ul>
        @foreach ($tasks as $task)
            <li>
                <span style="{{ $task->is_completed ? 'text-decoration: line-through;' : '' }}">
                    {{ $task->title }}
                </span>
                 <!-- Renommer -->
                         <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                                  @csrf
                                    @method('PUT')
                                  <input type="text" name="title" value="{{ $task->title }}" required>
                                     <button type="submit">Renommer</button>
                                   </form>

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
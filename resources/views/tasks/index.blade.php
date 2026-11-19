<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma ToDoList</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #e6dfd3;
            color: #1e293b;
            margin: 0;
            padding: 40px 28px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }

        .notebook {
            position: relative;
            width: 100%;
            max-width: 720px;
            background-color: #fffdf7;
            background-image:
                linear-gradient(to right, transparent 54px, #f87171 54px, #f87171 56px, transparent 56px),
                repeating-linear-gradient(
                    to bottom,
                    transparent 0px,
                    transparent 31px,
                    #cbd5e1 31px,
                    #cbd5e1 32px
                );
            border-radius: 6px 14px 14px 6px;
            padding: 28px 28px 36px 74px;
            box-shadow:
                0 12px 28px rgba(30, 41, 59, 0.14),
                inset 12px 0 18px -12px rgba(15, 23, 42, 0.18);
            border: 1px solid #d6cbb8;
        }

        .notebook::before {
            content: "";
            position: absolute;
            top: 16px;
            bottom: 16px;
            left: -12px;
            width: 24px;
            background-image: repeating-linear-gradient(
                to bottom,
                transparent 0px,
                transparent 14px,
                #475569 14px,
                #475569 20px,
                transparent 20px,
                transparent 32px
            );
            border-radius: 6px;
        }

        h1 {
            font-size: 1.65rem;
            font-weight: 700;
            color: #1d4ed8;
            margin: 0 0 16px 0;
            line-height: 32px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 16px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #94a3b8;
        }

        .filters {
            display: flex;
            gap: 8px;
        }

        .filters a {
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 600;
            color: #1e3a8a;
            background-color: #dbeafe;
            padding: 4px 12px;
            border-radius: 999px;
        }

        .filters a:hover,
        .filters a.active {
            background-color: #1d4ed8;
            color: #ffffff;
        }

        .counter {
            margin: 0;
            font-size: 0.88rem;
            font-weight: 700;
            color: #b91c1c;
            background-color: #fee2e2;
            padding: 4px 12px;
            border-radius: 999px;
        }

        .add-form {
            display: flex;
            gap: 8px;
            margin-bottom: 20px;
        }

        .add-form input[type="text"] {
            flex: 1;
            padding: 8px 12px;
            font-size: 0.95rem;
            color: #0f172a;
            background-color: rgba(255, 255, 255, 0.85);
            border: 1px solid #94a3b8;
            border-radius: 6px;
        }

        .add-form input[type="text"]:focus {
            outline: none;
            border-color: #1d4ed8;
            background-color: #ffffff;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            min-height: 44px;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .task-title {
            flex: 1;
            min-width: 140px;
            font-size: 0.98rem;
            font-weight: 500;
            color: #0f172a;
        }

        .task-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        .task-actions input[type="text"] {
            width: 145px;
            padding: 5px 8px;
            font-size: 0.84rem;
            color: #0f172a;
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #cbd5e1;
            border-radius: 5px;
        }

        button {
            padding: 5px 10px;
            font-size: 0.82rem;
            font-weight: 600;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            background-color: #ffffff;
            color: #1e293b;
            cursor: pointer;
        }

        button:hover {
            background-color: #f1f5f9;
        }

        .btn-add {
            background-color: #1d4ed8;
            color: #ffffff;
            border-color: #1d4ed8;
            padding: 8px 16px;
        }

        .btn-add:hover {
            background-color: #1e40af;
        }

        .btn-toggle {
            background-color: #dcfce7;
            color: #166534;
            border-color: #86efac;
        }

        .btn-toggle:hover {
            background-color: #bbf7d0;
        }

        .btn-delete {
            background-color: #fee2e2;
            color: #991b1b;
            border-color: #fca5a5;
        }

        .btn-delete:hover {
            background-color: #fecaca;
        }
    </style>
</head>
<body>
    <div>
    <span>Connecté en tant que : <strong>{{ auth()->user()->name }}</strong></span>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Déconnexion</button>
    </form>
</div>
    <div class="notebook">
        <h1>Ma ToDoList</h1>

        <div class="topbar">
            <div class="filters">
                <a href="{{ route('tasks.index', ['filter' => 'all']) }}" class="{{ ($filter ?? 'all') === 'all' ? 'active' : '' }}">Toutes</a>
                <a href="{{ route('tasks.index', ['filter' => 'active']) }}" class="{{ ($filter ?? 'all') === 'active' ? 'active' : '' }}">Actives</a>
                <a href="{{ route('tasks.index', ['filter' => 'completed']) }}" class="{{ ($filter ?? 'all') === 'completed' ? 'active' : '' }}">Terminées</a>
            </div>
            <p class="counter">Tâches restantes : {{ $remainingCount ?? $tasks->where('is_completed', false)->count() }}</p>
        </div>

        <form class="add-form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Nouvelle tâche sur le cahier..." required>
            <button type="submit" class="btn-add">Ajouter</button>
        </form>

        <ul>
            @foreach ($tasks as $task)
                <li>
                    <span class="task-title" style="{{ $task->is_completed ? 'text-decoration: line-through; color: #64748b;' : '' }}">
                        {{ $task->title }}
                    </span>

                    <div class="task-actions">
                        <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline-flex; gap:6px;">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="title" value="{{ $task->title }}" required>
                            <button type="submit">Renommer</button>
                        </form>

                        <form action="{{ route('tasks.update', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="toggle_completed" value="1">
                            <button type="submit" class="btn-toggle">
                                {{ $task->is_completed ? 'Annuler' : 'Terminer' }}
                            </button>
                        </form>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Supprimer</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
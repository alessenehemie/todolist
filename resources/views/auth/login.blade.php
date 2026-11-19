<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
    * { box-sizing: border-box; font-family: Arial, sans-serif; }
    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f4f5f7;
    }
    .auth-card {
        width: 100%;
        max-width: 380px;
        background: #fff;
        padding: 28px;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }
    h1 { margin-top: 0; font-size: 22px; text-align: center; }
    .field { margin-bottom: 14px; }
    label { display: block; margin-bottom: 6px; font-size: 14px; font-weight: 600; }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 14px;
    }
    .remember { display: flex; align-items: center; gap: 8px; margin-bottom: 16px; font-size: 14px; }
    button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 6px;
        background: #2563eb;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
    }
    button:hover { background: #1d4ed8; }
    .errors {
        background: #fee2e2;
        color: #991b1b;
        padding: 10px 12px;
        border-radius: 6px;
        margin-bottom: 14px;
        font-size: 13px;
    }
    .switch-link { text-align: center; margin-top: 16px; font-size: 14px; }
</style>
</head>
<body>
    <h1>Connexion</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
        </div>

        <button type="submit">Se connecter</button>
    </form>

    <p>Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a></p>
</body>
</html>
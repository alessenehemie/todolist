<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
    * {
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background: linear-gradient(135deg, #f6f1ea 0%, #e7dfd3 100%);
        color: #2b2623;
    }

    .register-box {
        width: 100%;
        max-width: 420px;
        background: #fffdf9;
        border: 1px solid #e6ddd0;
        border-top: 5px solid #c86d51;
        border-radius: 14px;
        padding: 32px 28px;
        box-shadow: 0 12px 28px rgba(43, 38, 35, 0.08);
    }

    .register-header {
        text-align: center;
        margin-bottom: 24px;
    }

    .register-header h1 {
        margin: 0 0 6px;
        font-size: 24px;
        font-weight: 700;
        color: #1f1b18;
    }

    .register-header p {
        margin: 0;
        font-size: 14px;
        color: #73685f;
    }

    .form-group {
        margin-bottom: 16px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-size: 13.5px;
        font-weight: 600;
        color: #3d3630;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 11px 13px;
        border: 1.5px solid #ddd3c5;
        border-radius: 8px;
        background: #faf7f2;
        font-size: 14px;
        color: #2b2623;
        transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        outline: none;
        background: #ffffff;
        border-color: #c86d51;
        box-shadow: 0 0 0 3px rgba(200, 109, 81, 0.16);
    }

    .btn-register {
        width: 100%;
        margin-top: 8px;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background: #c86d51;
        color: #ffffff;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s, transform 0.1s;
    }

    .btn-register:hover {
        background: #b0593e;
    }

    .btn-register:active {
        transform: scale(0.99);
    }

    .error-box {
        background: #fdf0ed;
        border-left: 4px solid #c93b2b;
        color: #8f2419;
        padding: 12px 14px;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 13px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 18px;
    }

    .login-link {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
        color: #6b6058;
    }

    .login-link a {
        color: #2f6f5e;
        font-weight: 600;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
    <h1>Créer un compte</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
</body>
</html>
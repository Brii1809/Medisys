<!-- Login Page -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediSys - Iniciar Sesión</title>
    <style>
        /* Reset y estilos base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #115e59 0%, #0d9488 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        /* Contenedor principal */
        .container {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 28rem;
        }

        /* Logo y título */
        .logo {
            display: block;
            height: 6rem;
            width: auto;
            margin: 0 auto;
            object-fit: contain;
        }

        .title {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 1.875rem;
            font-weight: 800;
            color: #111827;
        }

        /* Formularios y campos */
        .form-group {
            margin-bottom: 1rem;
        }

        .label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .input-group {
            position: relative;
        }

        .input {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            transition: all 0.2s;
        }

        .input:focus {
            outline: none;
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13, 148, 136, 0.1);
        }

        /* Botón mostrar contraseña */
        .toggle-password {
            position: absolute;
            right: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #6B7280;
        }

        /* Checkbox personalizado */
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox {
            width: 1rem;
            height: 1rem;
            accent-color: #0d9488;
        }

        /* Enlaces */
        .link {
            color: #0d9488;
            text-decoration: none;
            font-weight: 500;
        }

        .link:hover {
            color: #115e59;
        }

        /* Botón principal */
        .btn {
            width: 100%;
            padding: 0.5rem 1rem;
            background: #0d9488;
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn:hover {
            background: #115e59;
        }

        /* Alertas */
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .alert-error {
            background: #FEE2E2;
            border: 1px solid #F87171;
            color: #991B1B;
        }

        .alert-success {
            background: #DCFCE7;
            border: 1px solid #86EFAC;
            color: #166534;
        }

        .alert ul {
            margin-left: 1.5rem;
        }

        /* Layout utilities */
        .flex-between {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 1rem 0;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="{{ asset('images/logo-medisys.png') }}" alt="MediSys Logo">
        <h2 class="title">Iniciar Sesión</h2>

        @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="label" for="email">Correo Electrónico</label>
                <div class="input-group">
                    <input id="email" name="email" type="email" required
                           class="input" placeholder="correo@ejemplo.com">
                </div>
            </div>

            <div class="form-group">
                <label class="label" for="password">Contraseña</label>
                <div class="input-group">
                    <input id="password" name="password" type="password" required
                           class="input" placeholder="••••••••">
                    <button type="button" class="toggle-password" onclick="togglePassword()">👁️</button>
                </div>
            </div>

            <div class="flex-between">
                <div class="checkbox-group">
                    <input type="checkbox" id="remember-me" name="remember-me" class="checkbox">
                    <label for="remember-me">Recordarme</label>
                </div>
                <a href="{{ route('password.request') }}" class="link">¿Olvidaste tu contraseña?</a>
            </div>

            <button type="submit" class="btn">
                🔐 Ingresar
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleButton = document.querySelector('.toggle-password');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleButton.textContent = '👁️‍🗨️';
            } else {
                passwordField.type = 'password';
                toggleButton.textContent = '👁️';
            }
        }
    </script>
</body>
</html>

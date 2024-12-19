<!-- Panel Administrador Global -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador Global</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f0f2f5;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #0d9488;
            padding: 1rem;
            color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        /* Navegación */
        .nav-list {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        .nav-list a {
            color: white;
            text-decoration: none;
            padding: 0.5rem;
        }

        .nav-list a:hover {
            background: rgba(255,255,255,0.1);
            border-radius: 4px;
        }

        /* Contenido principal */
        .main-content {
            padding: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .card h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .nav-list {
                flex-direction: column;
                gap: 0.5rem;
            }

            .header {
                padding: 1rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <h1>Panel Administrador Global</h1>
        <nav>
            <ul class="nav-list">
                <li><a href="{{ route('admin.global.dashboard') }}">Inicio</a></li>
                <li><a href="{{ route('centros.index') }}">Gestión de Centros</a></li>
                <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li> <!-- Nueva ruta -->
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main-content">
        <section class="card">
            <h2>Resumen General</h2>
            <p>Bienvenido al panel de administración global. Aquí podrás gestionar los centros médicos y usuarios.</p>
        </section>
    </main>
</body>
</html>

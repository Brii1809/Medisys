<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Panel Administrador - Centro Médico')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background: #f0f2f5;
            min-height: 100vh;
        }

        .header {
            background: {{ $color_tema ?? '#004643' }};
            padding: 1rem 1.5rem;
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            flex: 1 1 100%;
            text-align: center;
        }

        .nav-list {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .nav-list a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            background: #006d62;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .nav-list a:hover {
            background: #005147;
        }

        .main-content {
            padding: 1.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #333;
        }

        @media (max-width: 768px) {
            .header {
                padding: 1rem;
            }

            .header h1 {
                font-size: 1.25rem;
            }

            .nav-list {
                flex-direction: column;
                gap: 0.5rem;
            }

            .nav-list a {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div style="display: flex; align-items: center; gap: 15px;">
            @if (Auth::user()->centroMedico->logo)
                <img src="{{ asset('storage/' . Auth::user()->centroMedico->logo) }}" alt="Logo Centro Médico"
                    style="height: 140px; width: auto; border-radius: 4px;">
            @endif
            <h1>Panel de {{ Auth::user()->centroMedico->nombre ?? 'Centro Médico' }}</h1>
        </div>
        <nav>
            <ul class="nav-list">
                <li><a href="{{ route('admin.centro.dashboard') }}">Inicio</a></li>
                <li>
                    <a href="{{ route('configurar.centro') }}"
                        style="background: #f9bc60; color: #001e1d; padding: 10px; border-radius: 4px;">
                        Configurar Centro Médico
                    </a>
                </li>
                <li><a href="{{ route('roles.index') }}">Gestión de Roles</a></li>
                <li>
                    <a href="{{ route('modulocaja.index') }}"
                        style="background: #0c95e4; color: #001e1d; padding: 10px; border-radius: 4px;">Gestión de
                        Caja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reportes.index') }}"
                    style="background: #e47207; color: #001e1d; padding: 10px; border-radius: 4px;">
                        <i class="fas fa-chart-pie"></i> Gestión de Reportes
                    </a>
                </li>
                <li><a href="{{ route('permisos.index') }}">Gestión de Permisos</a></li>
                <li><a href="{{ route('usuarios-centro.index') }}">Gestión de Usuarios</a></li>
                <li><a href="{{ route('personal-medico.index') }}">Gestión de Personal Médico</a></li>
                <li><a href="{{ route('trabajadores.index') }}">Gestión de Trabajadores</a></li>
                <li><a href="{{ route('especialidad.index') }}">Gestión de Especialidades</a></li>
                <li><a href="{{ route('horarios.index') }}">Gestión de Horarios</a></li>
                <li><a href="{{ route('turnos.disponibles') }}">Turnos Disponibles</a></li>
                <li><a href="{{ route('caja.index') }}">Facturación</a></li>
                <li><a href="{{ route('servicios.index') }}">Gestión de Servicios</a></li>
                <li>
                    <a href="{{ route('sangre.donadores.index') }}">
                        Donadores de Sangre
                    </a>
                </li>
                <li>
                    <a href="{{ route('sangre.solicitudes.index') }}">
                        Solicitudes de Sangre
                    </a>
                </li>

                <li><a href="{{ route('pacientes.index') }}">Gestión de Pacientes</a></li>
                <li><a href="{{ route('historial.index') }}">Historial Clínico</a></li>
                <li><a href="{{ route('alergias.index') }}">Gestión de Alergias</a></li>
                <li><a href="{{ route('diagnosticos.index') }}">Diagnósticos</a></li>
                <li><a href="{{ route('vacunas.index') }}">Gestión de Vacunas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cirugias.index') }}">Cirugías</a></li>
                <li class="nav-item"><a href="{{ route('recetas.index') }}" class="nav-link" style="color: #ffffff;">
                        Recetas y Medicamentos
                    </a>
                </li>
                <li><a href="{{ route('triajes.index') }}">Triajes</a></li>
                <li><a href="{{ route('tratamientos.index') }}" class="nav-link">Tratamientos</a></li>

                <li><a href="{{ route('archivos.index') }}">Archivos Adjuntos</a></li>

                <!-- Botón de Cerrar Sesión -->
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        </nav>
    </header>


    <main class="main-content">
        @yield('content')
    </main>
    <script src="{{ asset('js/toggle-files.js') }}" defer></script>
</body>

</html>

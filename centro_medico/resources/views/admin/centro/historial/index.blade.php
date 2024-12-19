@extends($layout)

@section('title', 'Historial Clínico')

@section('content')
    <div class="card">
        <h2 class="text-2xl font-bold mb-4">Historial Clínico</h2>

        <!-- Formulario de búsqueda de paciente por DNI -->
        <form action="{{ route('historial.index') }}" method="GET" class="mb-4">
            <label for="dni">Buscar Paciente por DNI:</label>
            <input type="text" name="dni" id="dni" placeholder="Ingrese el DNI del paciente" required>
            <button type="submit" class="btn btn-search">Buscar</button>
        </form>

        <!-- Si se encuentra un paciente, mostrar su información -->
        @if (isset($paciente))
            <div class="mb-4">
                <h3>Información del Paciente</h3>
                <p><strong>Nombre:</strong> {{ $paciente->primer_nombre }} {{ $paciente->primer_apellido }}</p>
                <p><strong>DNI:</strong> {{ $paciente->dni }}</p>
                <p><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
                <p><strong>Centro Médico:</strong> {{ Auth::user()->centroMedico->nombre }}</p>

                <!-- Mostrar opciones según si tiene o no historial clínico -->
                @if ($paciente->historialClinico->isNotEmpty())
                    <a href="{{ route('historial.show', $paciente->historialClinico->first()->id_historial) }}"
                        class="btn btn-view">Ver Historial Clínico</a>
                @else
                    <form action="{{ route('historial.store.paciente', ['idPaciente' => $paciente->id_paciente]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-create">Crear Historial Clínico</button>
                    </form>
                @endif
            </div>
        @elseif(isset($dni))
            <p class="text-error">No se encontró ningún paciente con el DNI {{ $dni }}.</p>
        @endif

        <!-- Tabla de todos los historiales clínicos -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID Historial</th>
                    <th>Paciente</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historiales as $historial)
                    <tr>
                        <td>{{ $historial->id_historial }}</td>
                        <td>{{ $historial->paciente->primer_nombre }} {{ $historial->paciente->primer_apellido }}</td>
                        <td>{{ $historial->fecha_creacion }}</td>
                        <td>
                            <a href="{{ route('historial.show', $historial->id_historial) }}" class="btn btn-view">Ver</a>
                            <a href="{{ route('historial.edit', $historial->id_historial) }}" class="btn btn-edit">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

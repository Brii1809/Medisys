@extends($layout)

@section('title', 'Editar Historial Clínico')

@section('content')
<div class="card">
    <h2 class="text-2xl font-bold mb-4">Editar Historial Clínico</h2>

    <form action="{{ route('historial.update', $historial->id_historial) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="fecha_creacion" class="block text-gray-700">Fecha de Creación</label>
            <input type="date" name="fecha_creacion" id="fecha_creacion" value="{{ $historial->fecha_creacion }}" class="w-full border-gray-300 rounded-md">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{ route('historial.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

<style>
    .card {
        padding: 1.5rem;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-top: 1.5rem;
    }
    .btn-primary {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }
    .btn-secondary {
        padding: 8px 16px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }
    .btn-primary:hover {
        background-color: #45a049;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }
</style>

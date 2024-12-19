{{-- resources/views/admin/centro/dashboard.blade.php --}}
@extends($layout)

@section('title', 'Panel de Control del Centro Médico')

@section('content')
<div class="card">
    <h2>Bienvenido al Panel de Administración del Centro: {{ $centro->nombre }}</h2>
    <p>Desde aquí, puedes gestionar el personal, usuarios, roles y permisos de tu centro.</p>
</div>
@endsection

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ReniecService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReniecController extends Controller
{
    protected $reniecService;

    public function __construct(ReniecService $reniecService)
    {
        $this->reniecService = $reniecService;
    }

    public function consultarDni(Request $request)
    {
        Log::info('Método consultarDni invocado', ['request' => $request->all()]);

        $request->validate(['dni' => 'required|digits:8']);

        $resultado = $this->reniecService->consultarDni($request->dni);

        if (isset($resultado['error'])) {
            Log::error('Error en la consulta DNI', ['error' => $resultado['error']]);
            return response()->json(['error' => 'Error al consultar el DNI'], 500);
        }

        Log::info('Respuesta exitosa', ['resultado' => $resultado]);

        return response()->json($resultado);
    }
}

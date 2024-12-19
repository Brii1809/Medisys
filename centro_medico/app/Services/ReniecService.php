<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\Log;

class ReniecService
{
    protected $microservicioClient;
    protected $fallbackClient;

    public function __construct()
    {
        // Configura cliente para Microservicio
        $this->microservicioClient = new Client([
            'base_uri' => config('services.microservicio.reniec_url'),
            'verify' => false,
        ]);

        // Configura cliente para API Externa
        $this->fallbackClient = new Client([
            'base_uri' => config('services.reniec.base_url'),
            'verify' => false,
        ]);
    }

    public function consultarDni($dni)
    {
        try {
            // Intenta consultar el Microservicio
            $response = $this->microservicioClient->request('POST', '', [
                'json' => ['dni' => $dni],
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);

            $datos = json_decode($response->getBody(), true);
            Log::info('Respuesta desde Microservicio', ['datos' => $datos]);

            return $datos;
        } catch (Exception $e) {
            Log::warning('Microservicio fallido, intentando respaldo', ['error' => $e->getMessage()]);

            // Respaldo: Consulta directa a la API externa
            try {
                $response = $this->fallbackClient->request('GET', 'dni', [
                    'query' => ['numero' => $dni],
                    'headers' => [
                        'Authorization' => 'Bearer ' . config('services.reniec.token'),
                        'Accept' => 'application/json',
                    ],
                ]);

                $datos = json_decode($response->getBody(), true);
                Log::info('Respuesta desde API externa (respaldo)', ['datos' => $datos]);

                return $datos;
            } catch (Exception $fallbackException) {
                Log::error('Error en el respaldo de API externa', ['error' => $fallbackException->getMessage()]);
                return ['error' => 'Error al consultar el DNI en microservicio y API externa.'];
            }
        }
    }
}

<?php

namespace App\Services;

use GuzzleHttp\Client;
use Exception;

class ReniecService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.reniec.base_url'),
            'verify' => false,
        ]);
    }

    public function consultarDni($dni)
    {
        try {
            $response = $this->client->request('GET', 'dni', [
                'query' => ['numero' => $dni],
                'headers' => [
                    'Authorization' => 'Bearer ' . config('services.reniec.token'),
                    'Accept' => 'application/json',
                ],
            ]);

            return json_decode($response->getBody(), true);
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

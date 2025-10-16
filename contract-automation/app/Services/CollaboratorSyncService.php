<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Collaborator;

class CollaboratorSyncService
{
    /**
     * Busca dados da API externa e salva/atualiza no banco.
     */
    public function sync(): void
    {
        // Simulando uma API externa (poderia ser uma rota separada)
        $response = Http::get('https://jsonplaceholder.typicode.com/users'); // apenas exemplo público

        if ($response->failed()) {
            throw new \Exception('Falha ao buscar dados da API.');
        }

        $data = $response->json();

        foreach ($data as $item) {
            // Normalização e criação no banco
            Collaborator::updateOrCreate(
                ['email' => $item['email']],
                [
                    'name' => $item['name'],
                    'email' => $item['email'],
                    'position' => 'Desenvolvedor',
                    'contract_type' => collect(['indeterminado', 'determinado', 'temporario', 'experiencia'])->random(),
                    'admission_date' => now()->subDays(rand(1, 30)),
                    'end_date' => rand(0, 1) ? now()->addMonths(rand(1, 12)) : null,
                    'salary' => rand(3000, 8000),
                ]
            );
        }
    }
}

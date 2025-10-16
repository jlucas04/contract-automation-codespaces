<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collaborator;
use Carbon\Carbon;

class CollaboratorSeeder extends Seeder
{
    public function run(): void
    {
        // Dados fixos da empresa
        $companyData = [
            'company_name' => 'SERVIÇO SOCIAL DA INDUSTRIA - SESI',
            'company_cnpj' => '03.798.336/0001-30',
            'company_address' => 'AV FERNANDES LIMA, 385, FAROL, MACEIÓ',
            'legal_representative' => 'José Carlos Lyra de Andrade',
            'city' => 'Maceió',
            'state' => 'AL',
        ];

        $roles = ['Desenvolvedor', 'Analista', 'Designer', 'Gerente'];
        $contractTypes = ['indeterminado', 'determinado', 'temporario', 'experiencia'];

        for ($i = 1; $i <= 10; $i++) {
            Collaborator::create([
                // Dados da empresa fixos
                'company_name' => $companyData['company_name'],
                'company_cnpj' => $companyData['company_cnpj'],
                'company_address' => $companyData['company_address'],
                'legal_representative' => $companyData['legal_representative'],
                'city' => $companyData['city'],
                'state' => $companyData['state'],

                // Dados do trabalhador
                'name' => "Trabalhador $i",
                'worker_rg' => '12.345.678-' . rand(1,9),
                'worker_cpf' => '123.456.789-'. rand(10,99),
                'worker_address' => 'Rua Trabalhador, '.rand(1,500).', Bairro, Cidade',
                'role' => $roles[array_rand($roles)],
                'salary' => rand(3000, 12000),
                'contract_type' => $contractTypes[array_rand($contractTypes)],

                // Contato e cargo
                'email' => "trabalhador$i@sesi.com.br",
                'position' => $roles[array_rand($roles)],
            ]);
        }
    }
}

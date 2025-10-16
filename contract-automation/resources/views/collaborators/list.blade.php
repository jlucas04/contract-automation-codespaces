<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Colaboradores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Colaboradores</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6">Empresa</th>
                    <th class="py-3 px-6">CNPJ</th>
                    <th class="py-3 px-6">Endereço Empresa</th>
                    <th class="py-3 px-6">Representante</th>
                    <th class="py-3 px-6">RG</th>
                    <th class="py-3 px-6">CPF</th>
                    <th class="py-3 px-6">Endereço Trabalhador</th>
                    <th class="py-3 px-6">Função</th>
                    <th class="py-3 px-6">Remuneração</th>
                    <th class="py-3 px-6">Cidade</th>
                    <th class="py-3 px-6">Estado</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($collaborators as $col)
                <tr class="border-b hover:bg-gray-100 transition duration-200">
                    <td class="py-3 px-6">{{ $col->company_name }}</td>
                    <td class="py-3 px-6">{{ $col->company_cnpj }}</td>
                    <td class="py-3 px-6">{{ $col->company_address }}</td>
                    <td class="py-3 px-6">{{ $col->legal_representative }}</td>
                    <td class="py-3 px-6">{{ $col->worker_rg }}</td>
                    <td class="py-3 px-6">{{ $col->worker_cpf }}</td>
                    <td class="py-3 px-6">{{ $col->worker_address }}</td>
                    <td class="py-3 px-6">{{ $col->role }}</td>
                    <td class="py-3 px-6">R$ {{ number_format($col->salary, 2, ',', '.') }}</td>
                    <td class="py-3 px-6">{{ $col->city }}</td>
                    <td class="py-3 px-6">{{ $col->state }}</td>
                    <td class="py-3 px-6 text-center">
                        <a href="{{ url('/contracts/generate/'.$col->id) }}" 
                           target="_blank"
                           class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                            Gerar Contrato
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

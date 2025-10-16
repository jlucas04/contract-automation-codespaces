<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Colaboradores</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-8 text-gray-800 text-center">Colaboradores</h1>

    <div class="overflow-x-auto rounded-lg shadow-lg">
        <table class="min-w-full bg-white divide-y divide-gray-200">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Empresa</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">CNPJ</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">RG</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">CPF</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Função</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Remuneração</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Cidade</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold">Estado</th>
                    <th class="py-3 px-4 text-center text-sm font-semibold">Ação</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($collaborators as $col)
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->company_name }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->company_cnpj }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->company_address }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->legal_representative }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->worker_rg }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->worker_cpf }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->worker_address }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->role }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">R$ {{ number_format($col->salary, 2, ',', '.') }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->city }}</td>
                    <td class="py-3 px-4 text-sm text-gray-700">{{ $col->state }}</td>
                    <td class="py-3 px-4 text-center">
                        <a href="{{ url('/contracts/generate/'.$col->id) }}" target="_blank"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow-md transition">
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

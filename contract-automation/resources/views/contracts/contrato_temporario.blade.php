<!-- resources/views/contracts/contrato_temporario.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Contrato Temporário</title>
    <style>
        body {
            font-family: "Arial", sans-serif;
            margin: 40px;
            line-height: 1.5;
            color: #333;
        }

        header {
            text-align: center;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        header img {
            max-height: 80px;
            display: block;
            margin: 0 auto 10px;
        }

        h2 {
            text-align: center;
            text-decoration: underline;
            color: #4CAF50;
            margin-bottom: 25px;
        }

        .section-title {
            background-color: #f2f2f2;
            padding: 8px 12px;
            margin-top: 20px;
            font-weight: bold;
            border-left: 5px solid #4CAF50;
        }

        .clause {
            margin-bottom: 15px;
            padding-left: 10px;
        }

        ul {
            margin: 5px 0 5px 20px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }

        .signature-box {
            width: 45%;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
            font-weight: bold;
        }

        footer {
            position: fixed;
            bottom: 20px;
            width: 100%;
            text-align: center;
            font-size: 11px;
            color: #888;
        }

        .highlight {
            font-weight: bold;
            color: #4CAF50;
        }

    </style></head>
<body>
<header>
<img src="{{ public_path('images/timbrado.png') }}" alt="Timbrado">
<div class="highlight">{{ $collaborator->company_name }}</div>
</header>

<h2>CONTRATO DE TRABALHO - TEMPORÁRIO</h2>

<div class="section-title">Empregador</div>
<p>{{ $collaborator->company_name }}, CNPJ: {{ $collaborator->company_cnpj }}, endereço: {{ $collaborator->company_address }}, representado por {{ $collaborator->legal_representative }}.</p>

<div class="section-title">Empregado</div>
<p>{{ $collaborator->name }}, RG: {{ $collaborator->worker_rg }}, CPF: {{ $collaborator->worker_cpf }}, endereço: {{ $collaborator->worker_address }}.</p>

<div class="section-title">Cláusulas</div>
<div class="clause"><strong>1ª – DO OBJETO:</strong> Prestação de serviços temporária de duração prevista de {{ $collaborator->end_date ? \Carbon\Carbon::parse($collaborator->end_date)->diffInDays(\Carbon\Carbon::now()) : '____' }} dias.</div>
<div class="clause"><strong>2ª – FUNÇÃO:</strong> {{ $collaborator->role }}.</div>
<div class="clause"><strong>3ª – REMUNERAÇÃO:</strong> R$ {{ number_format($collaborator->salary,2,',','.') }} mensais.</div>
<div class="clause"><strong>4ª – DISPOSIÇÕES FINAIS:</strong> Foro da comarca de {{ $collaborator->city }}/{{ $collaborator->state }}.</div>

<div class="signature-section">
<div class="signature-box">EMPREGADOR</div>
<div class="signature-box">EMPREGADO</div>
</div>

<p>Testemunhas:<br>1. __________________ CPF: _______<br>2. __________________ CPF: _______</p>
<p>{{ $collaborator->city }}, {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>

<footer>Documento gerado automaticamente via Sistema de Automação</footer>
</body>
</html>

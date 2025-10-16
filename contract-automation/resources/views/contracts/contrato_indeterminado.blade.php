<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Trabalho</title>
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

    </style>
</head>
<body>

<header>
    <img src="{{ public_path('images/timbrado.png') }}" alt="Timbrado Empresa">
    <div class="highlight">{{ $collaborator->company_name }}</div>
</header>

<h2>CONTRATO DE TRABALHO - INDETERMINADO</h2>

<div class="section-title">Empregador</div>
<p>{{ $collaborator->company_name }}, CNPJ: {{ $collaborator->company_cnpj }}, endereço: {{ $collaborator->company_address }}, representado por {{ $collaborator->legal_representative }}.</p>

<div class="section-title">Empregado</div>
<p>{{ $collaborator->name }}, RG: {{ $collaborator->worker_rg }}, CPF: {{ $collaborator->worker_cpf }}, endereço: {{ $collaborator->worker_address }}.</p>

<div class="section-title">Cláusulas</div>

<div class="clause">
    <strong>1ª – DO OBJETO:</strong> Prestação de serviços de forma não contínua, conforme a necessidade do EMPREGADOR.
</div>

<div class="clause">
    <strong>2ª – DA FUNÇÃO:</strong> {{ $collaborator->role }}.
</div>

<div class="clause">
    <strong>3ª – REMUNERAÇÃO:</strong> R$ {{ number_format($collaborator->salary, 2, ',', '.') }} por hora/dia trabalhado, incluindo:
    <ul>
        <li>Salário-base</li>
        <li>Férias proporcionais + 1/3</li>
        <li>Décimo terceiro salário proporcional</li>
        <li>Repouso semanal remunerado</li>
        <li>Adicionais legais, se houver</li>
    </ul>
</div>

<div class="clause">
    <strong>4ª – CONVOCAÇÃO:</strong> Antecedência mínima de 3 dias.
</div>

<div class="clause">
    <strong>5ª – RECUSA:</strong> Não gera penalidade.
</div>

<div class="clause">
    <strong>6ª – INATIVIDADE:</strong> Pode prestar serviços a outros empregadores, exceto concorrentes diretos.
</div>

<div class="clause">
    <strong>7ª – REGISTRO:</strong> Registro na CTPS Digital.
</div>

<div class="clause">
    <strong>8ª – VIGÊNCIA:</strong> Início na assinatura, vigor por tempo indeterminado.
</div>

<div class="clause">
    <strong>9ª – DISPOSIÇÕES FINAIS:</strong> Foro da comarca de {{ $collaborator->city }}/{{ $collaborator->state }}.
</div>

<div class="signature-section">
    <div class="signature-box">EMPREGADOR</div>
    <div class="signature-box">EMPREGADO</div>
</div>

<p>Testemunhas:</p>
<p>1. ________________________ CPF: ___________<br>
   2. ________________________ CPF: ___________</p>

<p>{{ $collaborator->city }}, {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>

<footer>Documento gerado automaticamente via Sistema de Automação de Contratos</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Trabalho</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 50px;
        }
        header {
            text-align: center;
            margin-bottom: 30px;
        }
        header img {
            width: 100%;
            max-height: 120px;
            object-fit: contain;
        }
        h2 {
            text-align: center;
            text-decoration: underline;
            margin: 20px 0;
        }
        .clause {
            margin-top: 15px;
        }
        .signature-section {
            margin-top: 50px;
        }
        .signature {
            display: inline-block;
            width: 45%;
            text-align: center;
        }
        .signature-line {
            margin-top: 60px;
            border-top: 1px solid #000;
        }
        .testemunhas {
            margin-top: 40px;
        }
        .highlight {
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>
    <img src="{{ public_path('images/timbrado.png') }}" alt="Timbrado">
</header>

<h2>CONTRATO DE TRABALHO INDIVIDUAL</h2>

<p>
    Pelo presente instrumento particular de contrato de trabalho intermitente, de um lado:  
    <span class="highlight">EMPREGADOR:</span> {{ $collaborator->company_name }}, inscrita no CNPJ sob o nº {{ $collaborator->company_cnpj }}, com sede em {{ $collaborator->company_address }}, neste ato representada por {{ $collaborator->legal_representative }}, doravante denominado(a) EMPREGADOR(A);
</p>

<p>
    e de outro:  
    <span class="highlight">EMPREGADO:</span> {{ $collaborator->name }}, portador(a) do RG nº {{ $collaborator->worker_rg }} e do CPF nº {{ $collaborator->worker_cpf }}, residente à {{ $collaborator->worker_address }}, doravante denominado(a) EMPREGADO(A);
</p>

<h3>CLÁUSULAS</h3>

<div class="clause">
    <strong>CLÁUSULA 1ª – DO OBJETO</strong><br>
    O presente contrato tem por objeto a prestação de serviços pelo EMPREGADO ao EMPREGADOR de forma não contínua, com alternância de períodos de prestação de serviços e de inatividade, conforme a necessidade do EMPREGADOR.
</div>

<div class="clause">
    <strong>CLÁUSULA 2ª – DA FUNÇÃO</strong><br>
    O EMPREGADO exercerá a função de {{ $collaborator->role }}, conforme as determinações do EMPREGADOR e as normas legais vigentes.
</div>

<div class="clause">
    <strong>CLÁUSULA 3ª – DA REMUNERAÇÃO</strong><br>
    O EMPREGADO receberá a quantia de R$ {{ number_format($collaborator->salary, 2, ',', '.') }} por hora/dia trabalhado, incluindo todos os adicionais previstos em lei.
</div>

<div class="clause">
    <strong>CLÁUSULA 4ª – DA VIGÊNCIA</strong><br>
    Este contrato tem início na data de sua assinatura e vigora por tempo indeterminado, salvo rescisão conforme a legislação vigente.
</div>

<div class="signature-section">
    <div class="signature">
        _________________________________________<br>
        Assinatura do EMPREGADOR
    </div>
    <div class="signature">
        _________________________________________<br>
        Assinatura do EMPREGADO
    </div>
</div>

<div class="testemunhas">
    <p>Testemunhas:</p>
    <p>1. Nome: ________________________ CPF: _______________________</p>
    <p>2. Nome: ________________________ CPF: _______________________</p>
</div>

<p style="text-align:right; margin-top:50px;">
    {{ $collaborator->city }}, {{ date('d/m/Y') }}
</p>

</body>
</html>

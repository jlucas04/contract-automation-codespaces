<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contrato de Trabalho - Indeterminado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            line-height: 1.5;
            margin: 2cm 2cm 2cm 2cm;
        }

        /* Cabeçalho com "timbrado" */
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #000;
        }

        .header h1 {
            margin: 0;
            font-size: 16pt;
            color: #004080;
        }

        .header p {
            margin: 2px 0;
            font-size: 10pt;
            color: #333;
        }

        h2 {
            text-align: center;
            text-decoration: underline;
            font-size: 14pt;
        }

        .clausula {
            margin-bottom: 10px;
        }

        .signature {
            margin-top: 50px;
        }

        .signature div {
            display: inline-block;
            width: 45%;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #000;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SERVIÇO SOCIAL DA INDÚSTRIA - SESI</h1>
        <p>CNPJ: 03.798.336/0001-30</p>
        <p>Endereço: AV FERNANDES LIMA, 385, FAROL, MACEIÓ - AL</p>
    </div>

    <h2>Contrato de Trabalho por Tempo Indeterminado</h2>

    <p>Pelo presente instrumento particular de contrato de trabalho, de um lado:</p>

    <p>
        EMPREGADOR: {{ $collaborator->company_name }}, inscrita no CNPJ sob o nº {{ $collaborator->company_cnpj }},
        com sede em {{ $collaborator->company_address }}, neste ato representada por {{ $collaborator->legal_representative }},
        doravante denominado(a) EMPREGADOR(A);
    </p>

    <p>e de outro:</p>

    <p>
        EMPREGADO: {{ $collaborator->name }}, portador(a) do RG nº {{ $collaborator->worker_rg }}
        e do CPF nº {{ $collaborator->worker_cpf }}, residente e domiciliado(a) à {{ $collaborator->worker_address }},
        doravante denominado(a) EMPREGADO(A);
    </p>

    <div class="clausula">
        <strong>CLÁUSULA 1ª – DO OBJETO</strong>
        <p>O presente contrato tem por objeto a prestação de serviços pelo EMPREGADO ao EMPREGADOR de forma contínua.</p>
    </div>

    <div class="clausula">
        <strong>CLÁUSULA 2ª – DA FUNÇÃO</strong>
        <p>O EMPREGADO exercerá a função de {{ $collaborator->role }}.</p>
    </div>

    <div class="clausula">
        <strong>CLÁUSULA 3ª – DA REMUNERAÇÃO</strong>
        <p>O EMPREGADO receberá a quantia de R$ {{ number_format($collaborator->salary, 2, ',', '.') }} por mês.</p>
    </div>

    <div class="clausula">
        <strong>CLÁUSULA 4ª – DA VIGÊNCIA</strong>
        <p>Este contrato entra em vigor na data de sua assinatura e vigorará por tempo indeterminado.</p>
    </div>

    <div class="signature">
        <div>
            <p class="signature-line">Assinatura do EMPREGADOR</p>
        </div>
        <div>
            <p class="signature-line">Assinatura do EMPREGADO</p>
        </div>
    </div>
</body>
</html>

<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContractMail; // 👈 Importa a classe Mailable

class ContractController extends Controller
{
    public function generateContract($id)
    {
        $collaborator = Collaborator::findOrFail($id);

        // Seleciona o template de acordo com o tipo de contrato
        $templateView = match($collaborator->contract_type) {
            'indeterminado' => 'contracts.contrato_indeterminado',
            'determinado'   => 'contracts.contrato_determinado',
            'temporario'    => 'contracts.contrato_temporario',
            'experiencia'   => 'contracts.contrato_experiencia',
            default         => 'contracts.contrato_indeterminado',
        };

        // Renderiza o Blade como HTML e gera o PDF
        $pdf = PDF::loadView($templateView, compact('collaborator'));

        // Define o nome e caminho do arquivo PDF
        $fileName = 'contrato_'.$collaborator->id.'.pdf';
        $filePath = storage_path('app/contracts/'.$fileName);

        // Salva o PDF no storage
        $pdf->save($filePath);

        // Envia o contrato por e-mail (Mailtrap ou Gmail)
        Mail::to($collaborator->email)->send(new ContractMail($collaborator, $filePath));

        // Retorna o download do PDF
        return response()->download($filePath);
    }
}

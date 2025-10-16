<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Barryvdh\DomPDF\Facade\Pdf;

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

        // Renderiza o Blade como HTML
        $pdf = PDF::loadView($templateView, compact('collaborator'));

        // Define o caminho do arquivo PDF
        $fileName = 'contrato_'.$collaborator->id.'.pdf';
        $filePath = storage_path('app/contracts/'.$fileName);

        // Salva o PDF
        $pdf->save($filePath);

        // Retorna o download do PDF
        return response()->download($filePath);
    }
}

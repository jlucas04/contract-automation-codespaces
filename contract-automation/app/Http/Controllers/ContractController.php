<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Storage;

class ContractController extends Controller
{
    public function generateContract($id)
    {
        $collaborator = Collaborator::findOrFail($id);

        // Seleciona o template de acordo com o tipo
        $templateView = match($collaborator->contract_type) {
            'indeterminado' => 'contracts.contrato_indeterminado',
            'determinado'  => 'contracts.contrato_determinado',
            'temporario'   => 'contracts.contrato_temporario',
            'experiencia'  => 'contracts.contrato_experiencia',
            default        => 'contracts.contrato_indeterminado'
        };

        // Renderiza o HTML do Blade
        $html = view($templateView, compact('collaborator'))->render();

        // Cria PDF com mPDF
        $mpdf = new Mpdf([
            'tempDir' => storage_path('app/tmp'), // necessário em alguns ambientes Codespaces
        ]);
        $mpdf->WriteHTML($html);

        // Gera o arquivo
        $fileName = 'contrato_' . $collaborator->id . '.pdf';
        $pdfPath = storage_path('app/contracts/' . $fileName);

        // Certifique-se que a pasta existe
        if (!file_exists(storage_path('app/contracts'))) {
            mkdir(storage_path('app/contracts'), 0777, true);
        }

        $mpdf->Output($pdfPath, \Mpdf\Output\Destination::FILE);

        // Retorna para download
        return response()->download($pdfPath);
    }
}

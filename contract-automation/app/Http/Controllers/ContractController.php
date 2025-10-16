<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContractMail;

class ContractController extends Controller
{
    public function generateContract($id)
    {
        $collaborator = Collaborator::findOrFail($id);

        // Seleciona o template de acordo com o tipo
        $template = match($collaborator->contract_type) {
            'indeterminado' => 'contracts.contrato_indeterminado',
            'determinado'  => 'contracts.contrato_determinado',
            'temporario'   => 'contracts.contrato_temporario',
            'experiencia'  => 'contracts.contrato_experiencia',
            default        => 'contracts.contrato_indeterminado'
        };

        $pdf = PDF::loadView($template, compact('collaborator'));
        $fileName = 'contrato_'.$collaborator->id.'.pdf';
        $pdf->save(storage_path('app/contracts/'.$fileName));

        return response()->download(storage_path('app/contracts/'.$fileName));
    }
}

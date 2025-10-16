<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContractMail extends Mailable
{
    use Queueable, SerializesModels;

    public $collaborator;
    public $pdfPath;

    public function __construct($collaborator, $pdfPath)
    {
        $this->collaborator = $collaborator;
        $this->pdfPath = $pdfPath;
    }

    public function build()
    {
        return $this->subject('Contrato de Trabalho - ' . $this->collaborator->company_name)
                    ->view('emails.contract')
                    ->attach($this->pdfPath, [
                        'as' => 'contrato.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Collaborator;

class ContractMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Collaborator $collaborator, public string $filePath) {}

    public function build()
    {
        return $this->subject('Contrato de Trabalho - ' . $this->collaborator->name)
                    ->view('emails.contract')
                    ->attach($this->filePath);
    }
}

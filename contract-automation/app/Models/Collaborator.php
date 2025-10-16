<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_cnpj',
        'company_address',
        'legal_representative',
        'name',
        'worker_rg',
        'worker_cpf',
        'worker_address',
        'role',
        'salary',
        'city',
        'state',
        'contract_type',
        'email',
        'position'
    ];
}

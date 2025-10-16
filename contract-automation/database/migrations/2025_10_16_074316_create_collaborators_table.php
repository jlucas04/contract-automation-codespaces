<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('company_cnpj')->nullable();
            $table->string('company_address')->nullable();
            $table->string('legal_representative')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('name')->nullable();
            $table->string('worker_rg')->nullable();
            $table->string('worker_cpf')->nullable();
            $table->string('worker_address')->nullable();
            $table->string('role')->nullable();
            $table->decimal('salary', 10, 2)->nullable();
            $table->string('contract_type')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('collaborators');
    }
};

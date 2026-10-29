<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Garante que o Laravel ache a tabela correta

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereco',
        'cidade',
        'estado',
        'cep',
    ];
}

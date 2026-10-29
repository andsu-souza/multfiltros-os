<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';

    protected $fillable = [
        'cliente_id',
        'tecnico_id',
        'data',
        'faixa_horario',
        'status',
        'observacoes',
    ];

    // Relacionamento: Um agendamento pertence a um Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacionamento: Um agendamento pode pertencer a um Técnico
    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        // O "with" carrega os dados do cliente e técnico junto para não pesar o banco
        $agendamentos = Agendamento::with(['cliente', 'tecnico'])->orderBy('data', 'asc')->paginate(10);
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();
        $tecnicos = Tecnico::orderBy('nome')->get();
        return view('agendamentos.create', compact('clientes', 'tecnicos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tecnico_id' => 'nullable|exists:tecnicos,id',
            'data' => 'required|date',
            'faixa_horario' => 'required|string|max:50',
            'status' => 'required|in:AGENDADO,CONFIRMADO,CONCLUIDO,CANCELADO',
            'observacoes' => 'nullable|string',
        ]);

        Agendamento::create($dados);
        return redirect()->route('agendamentos.index');
    }

    public function edit(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $clientes = Cliente::orderBy('nome')->get();
        $tecnicos = Tecnico::orderBy('nome')->get();

        return view('agendamentos.edit', compact('agendamento', 'clientes', 'tecnicos'));
    }

    public function update(Request $request, string $id)
    {
        $dados = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tecnico_id' => 'nullable|exists:tecnicos,id',
            'data' => 'required|date',
            'faixa_horario' => 'required|string|max:50',
            'status' => 'required|in:AGENDADO,CONFIRMADO,CONCLUIDO,CANCELADO',
            'observacoes' => 'nullable|string',
        ]);

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($dados);

        return redirect()->route('agendamentos.index');
    }

    public function destroy(string $id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        return redirect()->route('agendamentos.index');
    }
}

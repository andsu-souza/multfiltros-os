<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::latest()->paginate(10);
        return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
        return view('tecnicos.create');
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'nullable|string|max:100',
            'telefone' => 'nullable|string|max:20',
        ]);

        Tecnico::create($dados);

        return redirect()->route('tecnicos.index');
    }

    public function edit(string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(Request $request, string $id)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade' => 'nullable|string|max:100',
            'telefone' => 'nullable|string|max:20',
        ]);

        $tecnico = Tecnico::findOrFail($id);
        $tecnico->update($dados);

        return redirect()->route('tecnicos.index');
    }

    public function destroy(string $id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->delete();

        return redirect()->route('tecnicos.index');
    }
}

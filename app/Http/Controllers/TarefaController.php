<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function store(Request $request)
    {
        Tarefa::create([
            'lista_id' => $request->input('lista_id'),
            'title' => $request->input('title'),
            'completed' => false,
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->completed = true;
        $tarefa->save();

        return redirect()->back();
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->back();
    }
}

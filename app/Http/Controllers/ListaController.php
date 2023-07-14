<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;

class ListaController extends Controller
{

    //Exibe a página inicial com a lista de listas.
    public function index()
    {
        $listas = Lista::all();

        return view('index', compact('listas'));
    }


    //Cria uma nova lista.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Lista::create([
            'title' => $request->title,
            'completed' => false,
        ]);

        return redirect()->route('listas.index');
    }

    //Exibe uma lista específica.
    public function show(Lista $lista)
    {
        return view('task', compact('lista'));
    }


    //Atualiza uma lista existente.
    public function update(Request $request, Lista $lista)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'completed' => 'boolean',
        ]);

        $lista->update([
            'title' => $request->title,
            'completed' => $request->has('completed'),
        ]);

        return redirect()->route('listas.show', $lista);
    }

    //Exclui uma lista.
    public function destroy(Lista $lista)
    {
        $lista->delete();

        return redirect()->route('listas.index');
    }
}

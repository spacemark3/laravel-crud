<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Visualizza tutte le categorie
     */
    public function index()
    {
        $categorie = Categoria::all();
        return view('categorie.index', compact('categorie'));
    }

    /**
     * Mostra il form per creare una categoria
     */
    public function create()
    {
        return view('categorie.create');
    }

    /**
     * Visualizza gli articoli di una categoria
     */
    public function show(Categoria $categoria)
    {
        $articoli = $categoria->articoli()->paginate(10);
        return view('categorie.show', compact('categoria', 'articoli'));
    }

    /**
     * Salva la nuova categoria
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:categorie,nome',
            'descrizione' => 'nullable|string',
        ]);

        Categoria::create($validated);
        return redirect()->route('categorie.index')->with('success', 'Categoria creata!');
    }

    /**
     * Mostra il form per modificare una categoria
     */
    public function edit(Categoria $categoria)
    {
        return view('categorie.edit', compact('categoria'));
    }

    /**
     * Aggiorna una categoria
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255|unique:categorie,nome,' . $categoria->id,
            'descrizione' => 'nullable|string',
        ]);

        $categoria->update($validated);
        return redirect()->route('categorie.index')->with('success', 'Categoria aggiornata!');
    }

    /**
     * Elimina una categoria
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorie.index')->with('success', 'Categoria eliminata!');
    }
}

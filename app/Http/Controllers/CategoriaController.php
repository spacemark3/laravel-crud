<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    /**
     * Visualizza tutte le categorie
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categorie = Categoria::orderBy('created_at', 'asc');

        if ($search) {
            $categorie = $categorie->where('nome', 'like', '%' . $search . '%');
        }
        $categorie = $categorie->paginate(3);
        return view('categorie.index', compact('categorie', 'search'));
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
        $articoli = $categoria->articoli()->orderBy('created_at', 'desc')->paginate(6);
        //dd($articoli);
        return view('categorie.show', compact('categoria', 'articoli'));
    }
    /**
     * Salva la nuova categoria
     */
    public function store(StoreCategoriaRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('immagine')) {
            $data['immagine'] = $request->file('immagine')->store('categorie', 'public');
        }

        Categoria::create($data);
        return redirect()->route('categorie.index');
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
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $data = $request->validated();

        if ($request->hasFile('immagine')) {
            if ($categoria->immagine) {
                Storage::disk('public')->delete($categoria->immagine);
            }
            $data['immagine'] = $request->file('immagine')->store('categorie', 'public');
        }

        $categoria->update($data);
        return redirect()->route('categorie.index');
    }

    /**
     * Elimina una categoria
     */
    public function destroy(Categoria $categoria)
    {
        if ($categoria->immagine) {
            Storage::disk('public')->delete($categoria->immagine);
        }
        $categoria->delete();
        return redirect()->route('categorie.index')->with('success', 'Categoria eliminata!');
    }
}

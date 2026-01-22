<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticoloRequest;
use App\Http\Requests\UpdateArticoloRequest;
use App\Models\Articolo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticoloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $articolo = Articolo::orderBy('created_at', 'asc');
        if ($search) {
            $articolo->where('titoli', 'like', '%' . $search . '%');
        }

        $articoli = $articolo->paginate(6);
        return view('articoli.index', compact('articoli', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categoria::all();
        return view('articoli.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticoloRequest $request)
    {
        $data = $request->validated();
        
        if ($request->hasFile('immagine')) {
            $data['immagine'] = $request->file('immagine')->store('articoli', 'public');
        }
        Articolo::create($data);
        return redirect()->route('articoli.index')
        ->with('success', 'Articolo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show($articolo)
    {
        $articolo = Articolo::findOrFail($articolo);
        return view('articoli.show',compact('articolo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articolo $articolo)
    {
        $categorie = Categoria::all();
        return view('articoli.edit', compact('articolo', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticoloRequest $request, Articolo $articolo)
    {
        $data = $request->validated();
        
        if ($request->hasFile('immagine')) {
            if ($articolo->immagine) {
                Storage::disk('public')->delete($articolo->immagine);
            }
            $data['immagine'] = $request->file('immagine')->store('articoli', 'public');
        }
        $articolo->update($data);
        return redirect()->route('articoli.index')
        ->with('success','Articolo aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articolo $articolo)
    {
        if ($articolo->immagine) {
            Storage::disk('public')->delete($articolo->immagine);
        }
        $articolo->delete();
        return redirect()->route('articoli.index')
        ->with('success','Articolo eliminato con successo!');
    }
}

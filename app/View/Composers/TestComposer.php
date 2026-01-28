<?php

namespace App\View\Composers;

use App\Models\Articolo;
use App\Models\Categoria;
use Illuminate\View\View;

class TestComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
         //$view->with('articoli', Articolo::all());
         //$view->with('categorie', Categoria::all());
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Articolo;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
        public function animal(){
        $animali = ['Dog', 'Cat', 'Elephant', 'Tiger', 'Lion'];
        return view('test3', ['animali'=> $animali]);
    }

    public function functest(Request $request){
        $articoli = Articolo::all();
        return view('test3',compact('articoli'));
    }
}

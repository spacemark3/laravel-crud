<?php

namespace Database\Seeders;
use App\Models\Articolo;
use Illuminate\Database\Seeder;

class ArticoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 20) as $index) {
            $articolo = new Articolo();
            $articolo->titoli = 'Articolo ' . $index;
            $articolo->contenuto = 'Questo è il contenuto dell\'articolo ' . $index . '.';
            $articolo->save();
        }   
    }
}

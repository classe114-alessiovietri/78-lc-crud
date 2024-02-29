<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Pasta;

class PastaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pastasData = config('pasta');

        foreach ($pastasData as $index => $singlePasta) {
            $pasta = new Pasta();
            $pasta->src = $singlePasta['src'];
            $pasta->title = $singlePasta['titolo'];
            $pasta->type = $singlePasta['tipo'];
            // Questa riga mi crea un array fatto così: ['6', 'min']
            $explodedCottura = explode(' ', $singlePasta['cottura']);
            $pasta->cooking_time = intval($explodedCottura[0]);
            // Questa riga mi sostituisce la g nella stringa peso con il niente (stringa vuota)
            $replacedTextPeso = str_replace('g', '', $singlePasta['peso']);
            $pasta->weight = intval($replacedTextPeso);
            $pasta->description = $singlePasta['descrizione'];
            $pasta->save();
        }
    }
}

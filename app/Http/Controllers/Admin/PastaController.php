<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Pasta;

class PastaController extends Controller
{
    /*
        R - READ
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pastas = Pasta::all();

        return view('pastas.index', compact('pastas'));
    }

    /**
     * Display the specified resource.
     */
    // Versione 1: con dependency injection
    public function show(Pasta $pasta)
    {
        return view('pastas.show', compact('pasta'));
    }

    // Versione 2: con find e if per controllare se è stato trovato quello che cercavamo
    // public function show(string $id)
    // {
    //     $pasta = Pasta::find($id);

    //     if ($pasta == null) {
    //         // Vai in 404
    //         abort(404);
    //     }

    //     return view('pastas.show', compact('pasta'));
    // }

    // Versione 3: con findOrFail (che, nel caso in cui non trovasse niente che corrisponde a quella query, dà 404)
    // public function show(string $id)
    // {
    //     $pasta = Pasta::findOrFail($id);

    //     return view('pastas.show', compact('pasta'));
    // }
    /* -------------- FINE READ -------------- */

    /*
        C - CREATE
    */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pastas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'src'               => 'nullable|max:1024|url',
            'title'             => 'required|max:64',
            'type'              => 'required|max:16|in:corta,cortissima,lunga',
            'cooking_time'      => 'nullable|numeric|min:1|max:20',
            'weight'            => 'required|numeric|min:100|max:5000',
            'description'       => 'nullable|max:4096',
        ], [
            'title.required' => 'MESSAGGIO CUSTOM DI ALESSIO PER REQUIRED',
            'title.max' => 'MESSAGGIO CUSTOM DI ALESSIO PER MAX'
        ]);

        // dd($validatedData);

        // $validatedData = $request->all();

        $pasta = Pasta::create($validatedData);

        // OPPURE

        // $pasta = new Pasta();
        // $pasta->fill($pastaData);
        // $pasta->save();

        // $pasta = new Pasta();
        // $pasta->src = $pastaData['src'];
        // $pasta->title = $pastaData['title'];
        // $pasta->type = $pastaData['type'];
        // $pasta->cooking_time = $pastaData['cooking_time'];
        // $pasta->weight = $pastaData['weight'];
        // $pasta->description = $pastaData['description'];
        // $pasta->save();

        return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
    }
    /* -------------- FINE CREATE -------------- */

    /*
        U - UPDATE
    */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasta $pasta)
    {
        return view('pastas.edit', compact('pasta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasta $pasta)
    {
        $validatedData = $request->validate([
            'src'               => 'nullable|max:1024|url',
            'title'             => 'required|max:64',
            'type'              => 'required|max:16|in:corta,cortissima,lunga',
            'cooking_time'      => 'nullable|numeric|min:1|max:20',
            'weight'            => 'required|numeric|min:100|max:5000',
            'description'       => 'nullable|max:4096',
        ]);

        $pasta->update($validatedData);

        // OPPURE

        // $pasta->fill($pastaData);
        // $pasta->save();

        // $pasta->src = $pastaData['src'];
        // $pasta->title = $pastaData['title'];
        // $pasta->type = $pastaData['type'];
        // $pasta->cooking_time = $pastaData['cooking_time'];
        // $pasta->weight = $pastaData['weight'];
        // $pasta->description = $pastaData['description'];
        // $pasta->save();

        return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
    }
    /* -------------- FINE UPDATE -------------- */

    /*
        D - DELETE
    */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasta $pasta)
    {
        $pasta->delete();

        return redirect()->route('pastas.index');
    }
    /* -------------- FINE DELETE -------------- */
}

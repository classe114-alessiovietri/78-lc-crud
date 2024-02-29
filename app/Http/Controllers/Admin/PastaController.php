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
        $pastaData = $request->all();

        // TODO: valido i dati, ma lo faremo in futuro

        $pasta = new Pasta();
        $pasta->src = $pastaData['src'];
        $pasta->title = $pastaData['title'];
        $pasta->type = $pastaData['type'];
        $pasta->cooking_time = $pastaData['cooking_time'];
        $pasta->weight = $pastaData['weight'];
        $pasta->description = $pastaData['description'];
        $pasta->save();

        return redirect()->route('pastas.show', ['pasta' => $pasta->id]);
    }
    /* -------------- FINE CREATE -------------- */

    /*
        U - UPDATE
    */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /* -------------- FINE UPDATE -------------- */

    /*
        D - DELETE
    */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /* -------------- FINE DELETE -------------- */
}

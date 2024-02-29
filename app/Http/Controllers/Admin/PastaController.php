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
        // $pastas = Pasta::all();
        $pastas = [];

        return view('pastas.index', compact('pastas'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pasta = Pasta::find($id);

        return view('pastas.show', compact('pasta'));
    }
    /* -------------- FINE READ -------------- */

    /*
        C - CREATE
    */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

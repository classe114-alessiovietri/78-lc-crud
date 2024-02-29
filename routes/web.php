<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\PastaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $firstName = 'Gino';
    $lastName = 'Paoli';

    /*
        compact: crea un array associativo le cui chiavi sono le stringhe
                 che mettiamo tra le parentesi, mentre i valori di tali
                 chiavi sono i valori delle variabili con i nomi corrispondenti
                 alle stringhe inserite

        compact('firstName', 'lastName')
         |                                     |
         V                                     V

         [
            'firstName' => $firstName,
            'lastName' => $lastName,
         ]
    */

    /*
        dd: vuol dire dump and die, cioè fai il var_dump (più carino però)
            e poi stoppa l'esecuzione
    */
    // dd(compact('firstName', 'lastName'));

    return view('welcome', [
        'firstName' => $firstName,
        'lastName' => $lastName,
    ]);
    // return view('welcome', compact('firstName', 'lastName'));
});

Route::get('/chi-siamo', function () {
    return view('subpages.about');
});

/* CRUD Book */
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
/* Fine CRUD Book */



/* CRUD Pasta */
Route::resource('pastas', PastaController::class);

// // R - READ
// Come in resource
// Route::get('/pastas', [PastaController::class, 'index'])->name('pastas.index');
// Come in resource
// Route::get('/pastas/{id}', [PastaController::class, 'show'])->name('pastas.show');

// // C - CREATE
// Come in resource
// Route::get('/pastas/create', [PastaController::class, 'create'])->name('pastas.create');
// Route::post('/pastas/add', [PastaController::class, 'store'])->name('pastas.store');

// // U - UPDATE
// Route::get('/pastas/{id}/update', [PastaController::class, 'edit'])->name('pastas.edit');
// Route::put('/pastas/{request}/{id}/update', [PastaController::class, 'update'])->name('pastas.update');

// // D - DELETE
// Route::delete('/pastas/{id}/delete', [PastaController::class, 'destroy'])->name('pastas.destroy');
/* Fine CRUD Pasta */

// Route::get(PERCORSO CON CUI ARRIVARE ALLA PAGINA, FUNZIONE DI CALLBACK CHE MI CREA LA RISPOSTA DA DARE ALL UTENTE)

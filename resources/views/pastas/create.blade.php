@extends('layouts.app')

@section('page-title', 'Pastas Create')

@section('main-content')
<h1>
    Pastas Create
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('pastas.index') }}" class="btn btn-primary">
                Torna all'index delle paste
            </a>
        </div>
        
        <form action="{{ route('pastas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="src" class="form-label">SRC</label>
                <input type="text" class="form-control" id="src" name="src" placeholder="Inserisci la SRC..." maxlength="1024">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="64" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo..." maxlength="16" required>
            </div>

            <div class="mb-3">
                <label for="cooking-time" class="form-label">Tempo di cottura (in minuti)</label>
                <input type="number" class="form-control" id="cooking-time" name="cooking_time" placeholder="Inserisci il tempo di cottura..." min="1" max="20">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Peso (in grammi) <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Inserisci il peso..." min="100" max="5000" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione..."></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success w-100">
                    + Aggiungi
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

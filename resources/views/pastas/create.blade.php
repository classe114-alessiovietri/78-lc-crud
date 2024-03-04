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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pastas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="src" class="form-label">SRC</label>
                <input type="text" class="form-control @error('src') is-invalid @enderror" id="src" name="src" placeholder="Inserisci la SRC..." maxlength="1024" value="{{ old('src') }}">
                @error('src')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="64" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Inserisci il tipo..." maxlength="16" required value="{{ old('type') }}">
                @error('type')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cooking-time" class="form-label">Tempo di cottura (in minuti)</label>
                <input type="number" class="form-control @error('cooking_time') is-invalid @enderror" id="cooking-time" name="cooking_time" placeholder="Inserisci il tempo di cottura..." min="1" max="20" value="{{ old('cooking_time') }}">
                @error('cooking_time')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Peso (in grammi) <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="Inserisci il peso..." min="100" max="5000" required value="{{ old('weight') }}">
                @error('weight')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" maxlength="4096" placeholder="Inserisci la descrizione...">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
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

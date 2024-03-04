@extends('layouts.app')

@section('page-title', $pasta->title.' Edit')

@section('main-content')
<h1>
    {{ $pasta->title }} Edit
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

        <form action="{{ route('pastas.update', ['pasta' => $pasta->id]) }}" method="POST">
            {{--
                C   Cross
                S   Site
                R   Request
                F   Forgery
            --}}
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="src" class="form-label">SRC</label>
                <input
                    value="{{ old('src', $pasta->src) }}"
                    type="text" class="form-control" id="src" name="src" placeholder="Inserisci la SRC..." maxlength="1024">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input
                    value="{{ old('title', $pasta->title) }}"
                    type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo..." maxlength="64" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo <span class="text-danger">*</span></label>
                <input
                    value="{{ old('type', $pasta->type) }}"
                    type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo..." maxlength="16" required>
            </div>

            <div class="mb-3">
                <label for="cooking-time" class="form-label">Tempo di cottura (in minuti)</label>
                <input
                    value="{{ old('cooking_time', $pasta->cooking_time) }}"
                    type="number" class="form-control" id="cooking-time" name="cooking_time" placeholder="Inserisci il tempo di cottura..." min="1" max="20">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">Peso (in grammi) <span class="text-danger">*</span></label>
                <input
                    value="{{ old('weight', $pasta->weight) }}"
                    type="number" class="form-control" id="weight" name="weight" placeholder="Inserisci il peso..." min="100" max="5000" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione...">{{ old('description', $pasta->description) }}</textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-warning w-100">
                    Aggiorna
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

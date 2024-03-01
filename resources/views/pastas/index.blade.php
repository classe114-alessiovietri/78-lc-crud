@extends('layouts.app')

@section('page-title', 'Pastas')

@section('main-content')
<h1>
    Pastas Index
</h1>

<div class="row">
    <div class="col">
        <div class="mb-4">
            <a href="{{ route('pastas.create') }}" class="btn btn-success w-100 fs-5">
                + Aggiungi
            </a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Tempo di cottura</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pastas as $pasta)
                    <tr>
                        <th scope="row">{{ $pasta->id }}</th>
                        <td>{{ $pasta->title }}</td>
                        <td>{{ $pasta->type }}</td>
                        <td>{{ $pasta->cooking_time }} min.</td>
                        <td>{{ $pasta->weight }}g</td>
                        <td>
                            <a href="{{ route('pastas.show', ['pasta' => $pasta->id]) }}" class="btn btn-primary">
                                Vedi
                            </a>
                            <a href="{{ route('pastas.edit', ['pasta' => $pasta->id]) }}" class="btn btn-warning">
                                Modifica
                            </a>
                            <form
                                onsubmit="return confirm('Sei sicuro di voler eliminare questa pasta?');"
                                class="d-inline-block"
                                action="{{ route('pastas.destroy', ['pasta' => $pasta->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

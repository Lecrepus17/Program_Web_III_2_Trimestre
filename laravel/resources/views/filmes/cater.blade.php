@extends('includes.layout')

@section('content')
    <h2>Lincar Filmes com Categorias</h2>
    <form action="{{ route('link.cater') }}" method="POST">
            @csrf
            <input type="hidden" name="filmeid" value="{{ $selectedFilme->id }}">
            <div>
                <h3>Associar Categorias ao Filme "{{ $selectedFilme->name }}"</h3>
                <label for="categorias[]">Escolha as Categorias:</label><br>
                @foreach ($categorias as $categoria)
                    <label>
                        <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}"> {{ $categoria->name }}
                    </label><br>
                @endforeach
            </div>
            <button type="submit">Salvar</button>
        </form>
@endsection

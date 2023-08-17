@extends('includes.layout')

@section('content')
    <div class="login-container">
        <form action="{{ route('update.filme', $filme->id) }}" method="post" class="login-form" enctype="multipart/form-data">
            @csrf
            <h2>Editar filme</h2>
            <input type="text" name="name" placeholder="Nome do filme" value="{{ old('name', $filme->name ?? '') }}">
            <input type="text" name="sinopse" placeholder="Sinopse" value="{{ old('sinopse', $filme->sinopse ?? '')  }}">
            <input type="text" name="ano" placeholder="Ano" value="{{  old('ano', $filme->ano ?? '')  }}">
            <input type="file" name="imagem" placeholder="Link da imagem" value="{{ old('imagem', $filme->imagem ?? '')  }}">
            <input type="text" name="link" placeholder="Link do trailer" value="{{ old('link', $filme->link ?? '') }}">
            <input type="submit" value="Atualizar">
        </form>
    </div>
@endsection

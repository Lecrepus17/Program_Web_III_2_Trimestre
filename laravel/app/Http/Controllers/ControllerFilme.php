<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Http\Request;

class ControllerFilme extends Controller
{
    public function index(Request $request)
    {
        $filmesQuery = Filme::query();

        if ($request->has('categoria') && $request->categoria != null) {
            $categoriaId = $request->categoria;

            $filmesQuery->whereHas('categorias', function ($query) use ($categoriaId) {
                $query->where('categorias.id', $categoriaId);
            });
        }

        if ($request->has('ano') && $request->ano != null) {
            $ano = $request->ano;
            $filmesQuery->where('ano', $ano);
        }

        $filmes = $filmesQuery->get();

        $categorias = Categoria::all();
        $anos = Filme::distinct('ano')->pluck('ano');

        return view('filmes.index', compact('filmes', 'categorias', 'anos'));
    }

    public function show($id)
    {
        $filme = Filme::findOrFail($id);
        return view('filmes.show', compact('filme'));
    }

    public function createFilmes(){

    }
    public function filcaters()
    {
        return $this->hasMany(Filcater::class, 'filme_fk');
    }
    public function deleteFilmes(){

    }

    public function editFilmes(){

    }

}

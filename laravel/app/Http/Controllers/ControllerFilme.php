<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filcater;
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

    public function createFilmes(Request $request){
        if ($request->isMethod('POST')) {

            $imagePath = $request->file('imagem')->store('imagem', 'public');


            $film = [
                'name' => request('name'),
                'sinopse' => request('sinopse'),
                'ano' => request('ano'),
                'link' => request('link'),
            ];
            $film['imagem'] = $imagePath;

            Filme::create($film);
            // Lança um evento Registered que vai enviar um e-mail para o usuário
            //event(new Registered($filme));

            return redirect()->route('filmes.index');

        }
        return view('filmes/addFilme');
        //return dd($film);
    }


    public function deleteFilmes($id){

        $filme = Filme::findOrFail($id);

        $filme->delete();

        return redirect()->route('filmes.index');
    }

    public function filcaters(){
        return $this->hasMany(Filcater::class, 'filme_fk');
    }

    public function editFilmes($id){

        $filme = Filme::findOrFail($id);

        return view('filmes/edit', compact('filme'));

    }

    public function updateFilmes(Request $request, $id){
        $filme = Filme::findOrFail($id);

        $imagePath = $request->file('imagem')->store('imagem', 'public');


        $filme->update([
            'imagem' => $imagePath,
            'name' => $request->name,
            'sinopse' => $request->sinopse,
            'ano' => $request->ano,
            'link' => $request->link,
        ]);


        return redirect()->route('filmes.index');
    }
    public function caterFilme(Request $request, $id)
    {
        $selectedFilme = Filme::findOrFail($id);
        $categorias = Categoria::all();

        return view('filmes.cater', compact('selectedFilme', 'categorias'));
    }
    public function linkCater(Request $request)
    {

        $filmeId = $request->input('filmeid');

        $categorias = $request->input('categorias', []);

        $filme = Filme::findOrFail($filmeId);

        // Sync as categorias selecionadas com o filme
        foreach ($categorias as $categoriaId) {
            Filcater::create([
                'filme_fk' => $filmeId,
                'categoria_fk' => $categoriaId,
            ]);
        }
        return redirect()->route('filmes.index')->with('success', 'Categorias vinculadas com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class ControllerFilme extends Controller
{
    public function index()
    {
        $filmes = Filme::all();
        return view('filmes.index', compact('filmes'));
    }

    public function show($id)
    {
        $filme = Filme::findOrFail($id);
        return view('filmes.show', compact('filme'));
    }

    public function createFilmes(Request $request){
        if ($request->isMethod('POST')) {
            $film = [
                'name' => request('name'),
                'sinopse' => request('sinopse'),
                'ano' => request('ano'),
                'imagem' => request('imagem'),
                'link' => request('link'),
            ];

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

    public function editFilmes(Filme $filme){

        return view('filmes/edit', [
            'film' => $filme,
        ]);
    }

    public function updateFilmes(Filme $filme){
        $dados = [
            'name' => request('name'),
            'sinopse' => request('sinopse'),
            'ano' => request('ano'),
            'imagem' => request('imagem'),
            'link' => request('link'),
        ];

        $filme->save($dados);

        return redirect()->route('filmes.show');
    }

}

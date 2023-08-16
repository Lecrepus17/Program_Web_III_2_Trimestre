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
            $film = $request->validate([
                'name' => 'string|required',
                'sinopse' => 'string|required',
                'ano' => 'string|required',
                'imagem' => 'string|required',
                'link' => 'string|required',
            ]);

            $film = Filme::create($film);
            // Lança um evento Registered que vai enviar um e-mail para o usuário
            //event(new Registered($filme));

            //return redirect()->route('filme.show');

        }
        return view('filmes/addFilme');
        //return dd($film);
    }

    public function deleteFilmes(){

    }

    public function editFilmes(){

    }

}

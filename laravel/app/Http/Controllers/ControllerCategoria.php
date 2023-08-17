<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class ControllerCategoria extends Controller
{
    public function createCater(Request $request){
        if ($request->isMethod('POST')) {
            $film = [
                'name' => request('name'),
            ];

            Categoria::create($film);
            // Lança um evento Registered que vai enviar um e-mail para o usuário
            //event(new Registered($filme));

            return redirect()->route('filmes.index');

        }
        return view('filmes.categoria');
        //return dd($film);
    }
}

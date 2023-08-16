<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ControllerUser extends Controller
{

    /*public function index(){

        $user = User::all();
        return view('');
    }*/

    public function createUser(Request $request){
        if ($request->isMethod('POST')) {
            $usr = $request->validate([
                'name' => 'string|required',
                'email' => 'email|required', Rule::unique('user'),
                'password' => 'string|required',
            ]);

            $usr['password'] = Hash::make($usr['password']);

            $user = User::create($usr);
            // Lança um evento Registered que vai enviar um e-mail para o usuário
            event(new Registered($user));

            return redirect()->route('login');
        }
        return view('add');

        //return view('add');
    }

    public function deleteUser(){

    }

    public function editUser(){

    }

    public function login(Request $request){
        if($request->isMethod('POST')){
            $data = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
            if (Auth::attempt($data)){
                return redirect()->route('filmes.index');
            } else {
                return redirect()->route('login')->with('erro', 'Deu ruim');
            }
        }
        return view('login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('teste');
    }

}

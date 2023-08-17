<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Filme;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ControllerUser extends Controller
{
    public function createUser(Request $request){
        if ($request->isMethod('POST')) {
            $usr = $request->validate([
                'name' => ['string|required'],
                'email' => ['email|required', Rule::unique('user')],
                'password' => ['string|required'],
            ]);

            $usr['password'] = Hash::make($usr['password']);

            $user = User::create($usr);
            // Lança um evento Registered que vai enviar um e-mail para o usuário
            event(new Registered($user));

            return redirect()->route('addUser');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Verificar se o usuário atual é o admin ou se está tentando excluir a si mesmo
        if ($user->id == auth()->user()->id) {
            return redirect()->route('users')->with('error', 'Você não tem permissão para excluir este usuário.');
        }

        $user->delete();

        return redirect()->route('users');
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users');
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
        return redirect()->route('login');
    }
    public function promote($id)
    {
        $user = User::findOrFail($id);

        // Verificar se o usuário atual é o admin
        if (!auth()->user()->admin) {
            return redirect()->route('users')->with('error', 'Você não tem permissão para promover usuários.');
        }

        $user->update(['admin' => true]);

        return redirect()->route('users')->with('success', 'Usuário promovido para administrador.');
    }
}

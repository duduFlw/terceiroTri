<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', ['usuarios' => $usuarios, 'pagina' => 'usuarios']);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;
        $usuario->admin = $form->admin;
        $usuario->password = Hash::make($form->password);

        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', ['id' => $usuario, 'pagina' => 'usuarios']);
    }

    public function update(Request $form, Usuario $usuario)
    {
        $usuario->name = $form->name;
        $usuario->email = $form->email;

        $usuario->save();

        return redirect()->route('usuarios');
    }

    public function remove(Usuario $usuario)
    {
        return view('usuarios.remove', ['id' => $usuario, 'pagina' => 'usuarios']);
    }

    public function delete(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios');
    }


    // Ações de login
    public function login(Request $form)
    {

        // // Está enviando o formulário
        if ($form->isMethod('POST'))
        {   
            $remember = $form->rememberme;
            
            $credenciais = $form->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);

            if(Auth::attempt($credenciais, $remember))
            {
                session()->regenerate();
                return redirect()->route('home');
            }
            else
            {
                return redirect()->route('login')->with('erro','Usuário ou senha inválidos.');
            }

        }

        return view('usuarios.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}

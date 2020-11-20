<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Função para listar todos os usuários.
    public function fetchAll() 
    {
        $users = User::all();
    
        return view('layouts/lista', compact('users'));
    }

    // Função para criar usuários.
    public function createUser(StoreUserRequest $request) // 
    {   
        User::create($request->all());
        //return response()->json(['user' => $new_user], 201); API
        return view('layouts/cadastro', ['message_user' => 'Usuário cadastrado com sucesso!']);
    }

    // Função para buscar usuários pelo ID - 1
    public function getUserById($id) 
    {
        $user = User::find($id);
        return view('layouts/editar', ['users' => $user]);
    }

    // Função para buscar usuários pelo CPF
    public function getUserByCpf($cpf)
    {
        $get_user_cpf = DB::table('users')->where('cpf', $cpf)->first(); // Pegando o cpf no banco
    
        if(is_null($get_user_cpf)) {
            return response()->json(['message' => 'Usuário não encontrado.']); // Verificando se o CPF está cadastrado 
        }

        return response()->json(['user' => $get_user_cpf]);
    }

    // Função para editar os atributos do usuário
    public function updateUser(StoreUserRequest $request, $id)
    {    
        $users = User::find($id); // Buscando o ID cadastrado.
        
        $users->update($request->all()); // Atualizando dados
        
        $users = User::all();

        return redirect()->route('lista');
    } 
        
    // Função para deletar usuário
    public function deleteUser($id)
    {
        $user = User::find($id);
        
        $user->destroy();

        return redirect()->route('lista');
    }
}

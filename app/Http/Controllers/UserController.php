<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Função para listar todos os usuarios.
    public function fetchAll() 
    {
        $all_users = User::all();

        return response()->json(['users' => $all_users], 200);
    }


    // Função para criar usuarios.
    public function createUser(Request $request) 
    {
        $new_user = User::create($request->all());

        return response()->json(['user' => $new_user], 201);

    }


    // Buscar usuario por ID
    public function getUser(User $id) 
    {
        return response()->json(['users' => $id], 200);
    }


    // Editar atributos do usuario
    public function updateUser(Request $request, $id)
    {   
        $user = User::findOrFail($id); // Buscando o ID cadastrado
        $user->update($request->all());
        
        return response()->json(['user'=> $user], 200);
    } 
        
    
    // Deletar usuario
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['mensagem'=> 'Usuario deletado com sucesso.'], 200);
    }
}

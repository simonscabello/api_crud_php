<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    // Função para listar todos os usuarios.
    public function fetchAll() 
    {
        $all_users = User::all();

        return response()->json(['user' => $all_users], 200);
    }


    // Função para criar usuarios.
    public function createUser(StoreUserRequest $request) // 
    {
        $new_user = User::create($request->all());

        return response()->json(['user' => $new_user], 201);
    }


    // Buscar usuario por ID - 1
    public function getUser($id) 
    {
        $get_user = User::find($id);
        
        if (is_null($get_user)) {
            return response()->json(['message' => 'Usuario nao encontrado.'], 404);
        }

        return response()->json(['user' => $get_user], 200);
    }

    /* Buscar usuario por ID - 2 || Essa função é um modo mais enxuto de fazer a requisição. Optei pela função de cima para manter um padrão de retorno no código.
    public function get_User(User $id)
    {
        return response()->json(['user' => $id], 200);
    }*/

    // Funçao para editar atributos do usuario
    public function updateUser(StoreUserRequest $request, $id)
    {    
        $updated_user = User::find($id); // Buscando o ID cadastrado
        
        if(is_null($updated_user)){
            return response()->json(['message' => 'Usuario nao encontrado.'], 404); // Verificando se o usuario existe.
        }
        
        $validated = $request->validated(); // Validando informaçoes
        $updated_user->update($request->all()); // Atualizando dados
    
        return response()->json(['user' => $updated_user], 200);
    } 
        
    
    // Função para deletar usuario
    public function deleteUser($id)
    {
        $user = User::find($id);
        
        if (is_null($user)) {
            return response()->json(['message' => 'Usuario nao encontrado.'], 404);
        }

        $user->delete();

        return response()->json(['message'=> 'Usuario deletado com sucesso.'], 200);
    }
}

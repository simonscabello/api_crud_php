<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    // Função para listar todos os usuarios.
    public function fetchAll() 
    {
        $all_users = User::all();

        return response()->json(['all_users' => $all_users], 200);
    }


    // Função para criar usuarios.
    public function createUser(StoreUser $request) 
    {
        $validated = $request->validated();

        // Mostrando os erros que foram gerados
        /*if ($validated->fails()) {
            $errors = $validatedData->errors();
            
            return response()->json(['errors' => $errors], 500); 
        }*/

        $new_user = User::create($request->all());
        return response()->json(['created_user' => $new_user], 201);

    }


    // Buscar usuario por ID
    public function getUser(User $id) 
    {
        return response()->json(['id_user' => $id], 200);
    }


    // Editar atributos do usuario
    public function updateUser(Request $request, $id)
    {   
        $updated_user = User::findOrFail($id); // Buscando o ID cadastrado
        $updated_user->update($request->all());
        
        return response()->json(['updated_user'=> $updated_user], 200);
    } 
        
    
    // Deletar usuario
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message'=> 'Usuario deletado com sucesso.'], 200);
    }
}

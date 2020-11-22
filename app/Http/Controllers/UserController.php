<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function fetchAll() 
    {
        $users = User::all();
    
        return view('listusers', compact('users'));
    }

    
    public function createUser(StoreUserRequest $request) // 
    {   
        User::create($request->all());
       
        return view('createusers', ['message_user' => 'Usuário cadastrado com sucesso!']);
    }


    public function getUserById($id) 
    {
        $users = User::find($id);

        return view('editusers', ['users' => $users]);
    }

    public function getUserByCpf($cpf)
    {
        $get_user_cpf = DB::table('users')->where('cpf', $cpf)->first(); 
    
        if(is_null($get_user_cpf)) {
            return response()->json(['message' => 'Usuário não encontrado.']); 
        }

        return response()->json(['user' => $get_user_cpf]);
    }

    public function updateUser(StoreUserRequest $request, $id)
    {    
        $users = User::find($id);
        
        $users->update($request->all());
        
        return redirect()->route('listusers');
    } 

    public function deleteUser($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect()->route('listusers');
    }
}

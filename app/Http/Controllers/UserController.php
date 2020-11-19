<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Função para listar todos os usuários.
    public function fetchAll() 
    {
        $all_users = User::all();
        
        return response()->json(['user' => $all_users], 200);
    }

    // Função para criar usuários.
    public function createUser(StoreUserRequest $request) // 
    {
        $validated_cpf = $this->validateCpf($request->cpf);

        if (!$validated_cpf) {
             echo "<script>alert('CPF inválido!');</script>";
        }
        
        $new_user = User::create($request->all());
        echo "<script>alert('Usuário criado com sucesso');</script>";
        //return response()->json(['user' => $new_user], 201);

        return view('layouts/form');
    }

    // Função para buscar usuários pelo ID - 1
    public function getUserById($id) 
    {
        $get_user = User::find($id);
        
        if (is_null($get_user)) {
            return response()->json(['message' => 'Usuário não encontrado.'], 404);
        }

        return response()->json(['user' => $get_user], 200);
    }

    /* Função para buscar usuários pelo ID - 2 || Essa função é um modo mais enxuto de fazer a requisição. Optei pela função a cima para manter um padrão de retorno no código.
    public function get_User(User $id)
    {
        return response()->json(['user' => $id], 200);
    }*/

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
        $updated_user = User::find($id); // Buscando o ID cadastrado.
        $validated_cpf = $this->validateCpf($request->cpf); // Validando o CPF.

        if (!$validated_cpf) {
            return response()->json(['message' => 'CPF inválido.'], 406); // Verificando se o CPF é valido.
        }

        if(is_null($updated_user)){
            return response()->json(['message' => 'Usuario nao encontrado.'], 404); // Verificando se o usuario existe.
        }
        
        $updated_user->update($request->all()); // Atualizando dados
    
        return response()->json(['user' => $updated_user], 200);
    } 
        
    // Função para deletar usuário
    public function deleteUser($id)
    {
        $user = User::find($id);
        
        if (is_null($user)) {
            return response()->json(['message' => 'Usuario nao encontrado.'], 404);
        }

        $user->delete();

        return response()->json(['message'=> 'Usuario deletado com sucesso.'], 200);
    }

    // Função para checar se o CPF é válido.
    public function validateCpf($cpf) {

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
        
        // Verifica se foi informado todos os digitos corretamente - Verificação ja feita no StoreUserRequest
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o cálculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
}

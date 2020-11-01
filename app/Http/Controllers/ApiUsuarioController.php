<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class ApiUsuarioController extends Controller
{
        public function FetchAll() {
        // logic to get all forms 
      }
  
         public function createUser(Request $request) {
        // logic to create an user
            $usuario = new Usuario;
            $usuario->nome = $request->nome;
            $usuario->cpf = $request->cpf;
            $usuario->data_nascimento = $request->data_nascimento;
            $usuario->email = $request->email;
            $usuario->telefone = $request->telefone;
            $usuario->logradouro = $request->logradouro;
            $usuario->cidade = $request->cidade;
            $usuario->estado = $request->estado;
            $usuario->save();


            return response()->json([
                "message" => "User created"
            ], 201);
      }
  
      public function getUser($id) {
        // logic to get a form record 
      }
  
      public function updateUser(Request $request, $id) {
        // logic to update a form record 
      }
  
      public function deleteUser($id) {
        // logic to delete a form record 
      }
}

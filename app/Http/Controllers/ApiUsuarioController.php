<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class ApiUsuarioController extends Controller
{
      public function fetchAll() {
      // logic to get all users
      }
  
      public function createUser(Request $request) {
        // logic to create an user
            $user = new user;
            $user->name = $request->name;
            $user->cpf = $request->cpf;
            $user->date_birth = $request->date_birth;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->save();


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

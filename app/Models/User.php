<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    use HasFactory;

    protected $table = 'users'; // Faz associação do model User com a tabela users do db

    protected $fillable = [
        'name', 
        'cpf', 
        'date_birth', 
        'email', 
        'phone', 
        'address', 
        'city', 
        'state'
    ];
}

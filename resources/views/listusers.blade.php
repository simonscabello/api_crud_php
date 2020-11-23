<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('icons\ww.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <title>Lista de Usuários</title>

    <style>

        body {
            font-family: "Roboto", sans-serif;
            background-color: whitesmoke;
        }

        .table {
            font-size: 14px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .text-center {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        table a {
            margin-right: 1rem;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        td:last-child {
          padding: 10px;
          display: flex;
          justify-content: space-between;
        }

    </style>
</head>
<body>

    <h1 class="text-center">Usuários Cadastrados</h1>
    <div class="text-center">
        <a href="createusers" class="btn btn-success">Cadastrar novo Usuário</a>
    </div>
<div class="table-responsive container-fluid">
    <table class="table table-hover text-center">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Sexo</th>
          <th scope="col">CPF</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefone</th>
          <th scope="col">Endereço</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col">Ações</th> 
        </tr>
      </thead>
      <tbody>
       @foreach($users as $user)  
        <tr>
          <th scope="row">{{$user->id}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->gender}}</td>
          <td>{{$user->cpf}}</td>
          <td>{{$user->birth_date}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->city}}</td>
          <td>{{$user->state}}</td>
          <td>
            <!-- <a class="btn btn-info" href="#">Visualizar</a> -->
            <a class="btn btn-warning" href="/user/{{$user->id}}">Editar</a>
            <button type="submit" class="btn btn-danger" form="submitdelete">Deletar</button>
          </td>
        </tr>
        <form action="/user/{{$user->id}}" method="post" id="submitdelete">@csrf @method('delete')</form>
        @endforeach
      </tbody>
    </table>
    </div>
</body>
</html>
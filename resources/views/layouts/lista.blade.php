<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <title>Read</title>

    <style>

        body {
            font-family: "Roboto", sans-serif;
            background-color: whitesmoke;
        }

        table {
            max-width: 1600px;
            margin-left: 150px;
            margin-right: 150px;
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
            margin: 3px;
        }


    </style>
</head>
<body>

    <h1 class="text-center">Usuários Cadastrados</h1>

<div class="tabela">
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
                <a class="btn btn-warning" href="/user/{{$user->id}}">Editar</a>
                <a class="btn btn-danger" href="/user/delete/{{$user->id}}">Deletar</a>
                
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
    <div class="cadastrar text-center">
        <a href="cadastro" class="btn btn-primary">Cadastrar novo usuário</a>
    </div>
</body>
</html>
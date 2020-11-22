@extends('app')

@section('shortcuticon')
<link rel="shortcut icon" href="{{ asset('icons\ww.png') }}">

@section('title', 'Editar Usuário')

@section('header')
<header>
    <h1>Editar Usuário</h1>
</header>

@section('formulario')
    @if ($errors)
        <ul class="list-group">
            @foreach ($errors->all() as $error)

            <li class="alert alert-danger list-group-item-danger">{{$error}}</li>

            @endforeach
        </ul>
    @endif
    @if ($message_user ?? '')
        <div class="alert alert-success" role="alert">{{$message_user}}</div>
    @endif
    
    <form action="/{{$users->id}}" method="POST">
    @METHOD('PUT')
    @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control w-100 p-3 @error('name') is-invalid @enderror" id="name" name="name" placeholder="{{$users['name']}}" required>
        </div>
        <div class="form-group">
            <label for="gender">Sexo</label>
            <select class="custom-select @error('gender') is-invalid @enderror" id="validationDefault04" name="gender" required>
                <option selected disabled value="">{{$users['gender']}}</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="NI">Prefiro não informar</option>
            </select>
        </div>
        <div class="form-group">
            <label for="cpf">C.P.F.</label>
            <input type="text" class="form-control w-100 p-3 @error('cpf') is-invalid @enderror" id="cpf"  name="cpf" placeholder="{{$users['cpf']}}" required>
        </div>
        <div class="form-group">
            <label for="birth_date">Data de nascimento</label>
            <input type="text" class="form-control w-100 p-3 @error('birth_date') is-invalid @enderror" id="birth_date"  name="birth_date" placeholder="{{$users['birth_date']}}" required>
        </div>
        <div class="form-group"> 
            <label for="email">E-mail</label>
            <input type="email" class="form-control w-100 p-3 @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{$users['email']}}">
            <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu e-mail com ninguém.</small>
        </div>
        <div class="form-group">
            <label for="phone">Telefone de Contato</label>
            <input type="text" class="form-control w-100 p-3 @error('phone') is-invalid @enderror" id="phone"  name="phone" placeholder="{{$users['phone']}}" required>
        </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" class="form-control w-100 p-3 @error('address') is-invalid @enderror" id="address" name="address" placeholder="{{$users['address']}}" required>
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control w-100 p-3 @error('city') is-invalid @enderror" id="city" name="city" placeholder="{{$users['city']}}" required>
        </div>
        <div class="form-group">
            <label for="state">Estado</label>
             <select class="custom-select @error('state') is-invalid @enderror" id="validationDefault04" name="state" required>
                <option selected disabled value="">{{$users['state']}}</option>
                <option value="AC">Acre</option>
                <option value="AL">Alagoas</option>
                <option value="AP">Amazonas</option>
                <option value="AM">Amazonas</option>
                <option value="BA">Bahia</option>
                <option value="CE">Ceará</option>
                <option value="ES">Espírito Santo</option>
                <option value="GO">Goiás</option>
                <option value="MA">Maranhão</option>
                <option value="MT">Mato Grosso</option>
                <option value="MS">Mato Grosso do Sul</option>
                <option value="MG">Minas Gerais</option>
                <option value="PA">Pará</option>
                <option value="PB">Paraíba</option>
                <option value="PR">Paraná</option>
                <option value="PE">Pernambuco</option>
                <option value="PI">Piauí</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="RN">Rio Grande do Norte</option>
                <option value="RS">Rio Grande do Sul</option>
                <option value="RO">Rondônia</option>
                <option value="RR">Roraima</option>
                <option value="SC">Santa Catarina</option>
                <option value="SP">São Paulo</option>
                <option value="SE">Sergipe</option>
                <option value="TO">Tocantins</option>
                <option value="DF">Distrito Federal</option>

            </select> 
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    
    </form>
@endsection
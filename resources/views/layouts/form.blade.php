@extends('layouts.app')

@section('title', 'Formulário')

@section('header')
<header>
    <h1>Cadastro</h1>
</header>

@section('formulario')
    <form action="/form" method="POST">
    @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control w-100 p-3" id="name" name="name" placeholder="Informe seu nome completo." required>
        </div>
        <div class="form-group">
            <label for="cpf">C.P.F</label>
            <input type="text" class="form-control w-100 p-3" id="cpf"  name="cpf"placeholder="Informe apenas os números." required>
        </div>
        <div class="form-group">
            <label for="birth_date">Data de nascimento</label>
            <input type="text" class="form-control w-100 p-3" id="birth_date"  name="birth_date" placeholder="Exemplo: 1990-05-22" required>
        </div>
        <div class="form-group"> 
            <label for="email">E-mail</label>
            <input type="email" class="form-control w-100 p-3" id="email" name="email" placeholder="fulano@gmail.com">
            <small id="emailHelp" class="form-text text-muted">Nós nunca iremos compartilhar seu e-mail com ninguém.</small>
        </div>
        <div class="form-group">
            <label for="phone">Telefone de Contato</label>
            <input type="text" class="form-control w-100 p-3" id="phone"  name="phone" placeholder="Informe apenas o número junto ao DDD." required>
        </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" class="form-control w-100 p-3" id="address" name="address" placeholder="Informe seu endereço. Rua e Número." required>
        </div>
        <div class="form-group">
            <label for="city">Cidade</label>
            <input type="text" class="form-control w-100 p-3" id="city" name="city" placeholder="Informe sua cidade." required>
        </div>
        <div class="form-group">
            <label for="state">Estado</label>
             <select class="custom-select" id="validationDefault04" name="state" required>
                <option selected disabled value="">Selecione o estado</option>
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
            <!-- <input type="text" class="form-control w-100 p-3" id="state"  name="state" placeholder="Informe apenas a sigla de seu estado. Exemplo: SP" required> -->
        </div>
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
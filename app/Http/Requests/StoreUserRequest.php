<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
Use App\Rules\ValidateCpf;

// Classe para validação dos dados. Está sendo usada na funçao createUser() e na updateUser().

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules()
    {   
        return 
        [
            'name' => 'required|min:3|max:200',
            'gender' => 'required',
            'cpf' => ['required', 'unique:users,cpf,'.$this->id, new ValidateCpf],
            'birth_date' => 'required|date_format:"Y-m-d"',
            'email' => 'email|required',
            'phone' => 'required|numeric|digits_between:8,30',
            'address' => 'required|max:200',
            'city' => 'required|max:50',
            'state' => 'required',
        ];
    }

    
    public function messages()
    {
        return 
        [
            'name.required' => 'Por favor, nos informe seu nome.',
            'name.min' => 'Por favor, digite seu nome completo.',
            'name.max' => 'Por favor, verifique seu nome.',
            'gender.required' => 'Por favor, nos informe seu gênero.',
            'cpf.required' => 'Por favor, nos informe seu CPF.',
            'cpf.digits' => 'Por favor, o CPF precisa ter 11 dígitos no total.',
            'cpf.unique' => 'CPF já cadastrado. Verifique e tente novamente.',
            'cpf.numeric' => 'Por favor, o CPF deve conter apenas números.',
            'email.email' => 'Por favor, digite um E-mail valido.',
            'email.required' => 'Por favor, nos informe seu E-mail.',
            'birth_date.required' => 'Por favor, nos informe sua data de nascimento.',
            'birth_date.date_format' => 'Por favor, use o formato de data: ano-mes-dia',
            'phone.required' => 'Por favor, digite o numero do seu Telefone.',
            'phone.digits_between' => 'Por favor, verifique o numero do seu Telefone.',
            'phone.numeric' => 'Por favor, digite apenas os numeros do seu Telefone.',
            'address.required' => 'Por favor, nos informe seu Endereço.',
            'city.required' => 'Por favor, nos informe a sua Cidade.',
            'state.required' => 'Por favor, nos informe o Estado em que voce reside.',
            'state.between' => 'Por favor, use apenas a sigla do seu Estado. Exemplo: ES',
        ];
    }

    // Subescrevendo uma funçao do Laravel para trazer as mensagens de error.
    // Sem fazer isso, o metodo validated() retorna para a pagina anterior, como diz na documentação.
    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}

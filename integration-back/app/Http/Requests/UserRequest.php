<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
{
    protected function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

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
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'numeric|digits:9',
            'password' => 'required',
            'cpf' => 'required|cpf|unique:users,cpf',
            'gender' => 'required',
            'birthday' => 'required'
        ];
    }

    public function messages() {
        return [
            // Mensagens personalizadas
            'name.string' => 'Você precisa digitar um nome',
            'email.email' => 'Insira um email válido',
            'email.unique' => 'Este e-mail já existe',
            'cpf' => 'Digite um CPF válido',
            'telephone' => 'O seu telefone precisa ter 9 digitos.',
            'cpf.unique' => 'Este CPF já existe'
        ];
    }
}

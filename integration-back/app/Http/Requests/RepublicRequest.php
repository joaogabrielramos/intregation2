<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Republic;


class RepublicRequest extends FormRequest
{
        protected function failedValidation(Validator $validator) 
        {
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
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'district' => 'required',
        ];
    }

    public function messages () 
    {
        return [
        // Mensagens personalizadas
        'name' => 'Adicione um nome à sua república',
        'address' => 'Você precisa adicionar um endereço',
        'city' => 'Você precisa adicionar uma cidade',
        'district' => 'Você precisa adicionar um bairro',
        ];
    }
}

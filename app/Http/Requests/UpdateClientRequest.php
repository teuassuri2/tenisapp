<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
'name' => ['required'], 
'telefone' => ['required'], 
'email' => ['required'], ];

    }

    public function messages()
    {
        return [
'name.required' => 'O campo é Name obrigatório', 
'telefone.required' => 'O campo é Telefone obrigatório', 
'email.required' => 'O campo é Email obrigatório', ];

    }
}

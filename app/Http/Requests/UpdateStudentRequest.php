<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'client_id' => ['required'],
            'level_id' => ['required'],];
    }

    public function messages() {
        return [
            'name.required' => 'O campo é Name obrigatório',
            'email.required' => 'O campo é Email obrigatório',
            'phone.required' => 'O campo é Phone obrigatório',
            'client_id.required' => 'O campo é Client_id obrigatório',
            'level_id.required' => 'O campo é Level_id obrigatório',];
    }

}

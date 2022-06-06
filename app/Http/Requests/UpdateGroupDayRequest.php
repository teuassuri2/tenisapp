<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroupDayRequest extends FormRequest
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
'day' => ['required'], 
'group_id' => ['required'], ];

    }

    public function messages()
    {
        return [
'day.required' => 'O campo é Day obrigatório', 
'group_id.required' => 'O campo é Group_id obrigatório', ];

    }
}

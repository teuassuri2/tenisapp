<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGroupStudentRequest extends FormRequest
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
'group_id' => ['required'], 
'student_id' => ['required'], ];

    }

    public function messages()
    {
        return [
'group_id.required' => 'O campo é Group_id obrigatório', 
'student_id.required' => 'O campo é Student_id obrigatório', ];

    }
}

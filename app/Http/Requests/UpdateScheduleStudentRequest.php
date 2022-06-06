<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateScheduleStudentRequest extends FormRequest
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
'date' => ['required'], 
'presence_absence' => ['required'], 
'status' => ['required'], 
'user_id' => ['required'], 
'group_student_id' => ['required'], 
'schedule_student_id' => ['required'], ];

    }

    public function messages()
    {
        return [
'date.required' => 'O campo é Date obrigatório', 
'presence_absence.required' => 'O campo é Presence_absence obrigatório', 
'status.required' => 'O campo é Status obrigatório', 
'user_id.required' => 'O campo é User_id obrigatório', 
'group_student_id.required' => 'O campo é Group_student_id obrigatório', 
'schedule_student_id.required' => 'O campo é Schedule_student_id obrigatório', ];

    }
}

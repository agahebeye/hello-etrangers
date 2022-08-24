<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'mother_firstname' => 'string|max:255',
            'mother_lastname' => 'string|max:255',
            'father_firstname' => 'string|max:255',
            'father_lastname' => 'string|max:255',
            'birth' => 'string',
            'gender' => [Rule::in(['Masculin', 'Féminin'])],
            'marital_status' => [Rule::in(['bachelor', 'married', 'divorced', 'widowed'])],
            'citizenship' => 'string|max:255',
            'profession' => 'string|max:255',
            'passport_number' => 'string',
            'passport_issue' => 'string|max:255',
            'passport_validity' => 'date',
            'stay_purpose' => 'string|max:255',
            'person_reference' => 'string|max:255',
            'arrival_date' => 'date',
            'current_occupation' => 'string|max:255',
            'adress' => 'string',
            'stay_duration' => 'string|max:255',
            'has_been' => 'nullable|boolean',
            'has_been_period' => 'nullable|string|max:255',
            'visa_kind' => 'string|max:255',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDocumentRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'mother_firstname' => 'required|string|max:255',
            'mother_lastname' => 'required|string|max:255',
            'father_firstname' => 'required|string|max:255',
            'father_lastname' => 'required|string|max:255',
            'birth' => 'required|string',
            'gender' => ['required', Rule::in(['male', 'female'])],
            'marital_status' => ['required', Rule::in(['bachelor', 'married', 'divorced', 'widowed'])],
            'citizenship' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'passport_number' => 'required|string',
            'passport_issue' => 'required|string|max:255',
            'passport_validity' => 'required|date',
            'stay_purpose' => 'required|string|max:255',
            'person_reference' => 'required|string|max:255',
            'arrival_date' => 'required|date',
            'current_occupation' => 'required|string|max:255',
            'adress' => 'required|string',
            'stay_duration' => 'required|string|max:255',
            'has_been' => 'required|boolean',
            'has_been_period' => 'required|string|max:255',
            'visa_kind' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'gender.required' => 'Le Champ sexe est obligatoire.'
        ];
    }
}

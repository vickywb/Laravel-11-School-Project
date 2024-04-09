<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'required|string', 
        'nisn' => 'required|numeric', 
        'gender' => 'required', 
        'religion' => 'required', 
        'place_of_birth' => 'required', 
        'date_of_birth' => 'required',
        'address' => 'required', 
        'phone_number' => 'required|numeric', 
        'origin_of_school' => 'required', 
        'address_of_school' => 'required',
        'father_name' => 'required', 
        'mother_name' => 'required', 
        'father_job' => 'required', 
        'mother_job' => 'required', 
        'phone_number_parent' => 'required|numeric'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateJobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(Request $request): bool
    {
        if($request->user()->hasRole('employer')){
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            "title"        => "required|max:255",
            "description"  => "required",
            "company"      => "required|max:255",
            "category"     => "required|max:255",
            "location"     => "required|max:255",
            "salary_range" => "required|max:255",
            "job_type"     => "required|max:255",
            "skills"       => "required|max:255",
        ];
    }

    /**
     * Return an error in a formatted way.
     *
     * @return error response.
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 400));
    }

}

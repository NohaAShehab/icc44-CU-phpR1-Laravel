<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTrackRequest extends FormRequest
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
            //
//            'name'=>'required|unique:tracks|min:5'
        'name'=>['required', Rule::unique('tracks')->ignore($this->track),
            'min:5']
        ];
    }

    function messages()
    {
        return[
            'name.required'=>"Track must have name",
            'name.min'=>'Track name should be at least 5 chars'
        ];
    }
}

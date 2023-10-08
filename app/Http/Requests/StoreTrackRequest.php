<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrackRequest extends FormRequest
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
            'name'=>'required|unique:tracks|min:5'
        ];
    }

    function messages()
    {
        # use middleware --->
      return[
          'name.required'=>"Track must have name",
          'name.min'=>'Track name should be at least 5 chars'
      ];
    }
}

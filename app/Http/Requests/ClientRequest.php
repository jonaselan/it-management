<?php

namespace itmanagement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        return [
            'name' => 'required|max:100',
            'cnpj' => 'required|max:20'
        ];
    }
}

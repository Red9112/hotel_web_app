<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
        return [
            'nbrPersonnes' => 'required|numeric',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after_or_equal:check_in',
           
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:20',
            'adress' => 'required|string|min:4|max:255',
            'cne' => 'required|string',
            'num_passport' => "string|unique:customers,num_passport,$this->customer->id",
            'gender'=> 'required|in:Male,Female'
               
        ];
    }
}
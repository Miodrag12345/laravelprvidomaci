<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            "name" => "required",
            "description" =>"required",
            "amount" =>"int|required|min:0",
            "price"=>"required|min:0",
            "image"=>"required"
        ];

    }
}

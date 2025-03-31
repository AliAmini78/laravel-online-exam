<?php

namespace Api\Auth\Http\Requests;

use Api\Base\Http\Requests\MainRequest;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends MainRequest
{
    public function rules(): array
    {
        return [
            "email" => ['required' , "email"],
            "password" => ['required' , "min:6"]
        ];
    }

}

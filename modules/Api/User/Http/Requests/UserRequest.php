<?php

namespace Api\User\Http\Requests;

use Api\Base\Http\Requests\MainRequest;
use Api\User\Enum\UserTypeEnum;
use Api\User\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends MainRequest
{
    public function rules(): array
    {
        if (request()->method() === "post")
            return [
                'name' => ['required', "string" , "min:2" , "max:25"],
                'email' => ['required', 'email', 'max:254' , Rule::unique((new User())->getTable() , "email")],
                'password' => ['required' , "min:6"],
                'type' => ['required' , new Enum(UserTypeEnum::class)],
                'birthday' => ['nullable', 'date'],
            ];

        return [
            'name' => ['required', "string" , "min:2" , "max:25"],
            'email' => ['required', 'email', 'max:254' , Rule::unique((new User())->getTable() , "email")->ignore($this->route("user") , "id")],
            'password' => ['required' , "min:6"],
            'type' => ['required' , new Enum(UserTypeEnum::class)],
            'birthday' => ['nullable', 'date'],
        ];
    }
}

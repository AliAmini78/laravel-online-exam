<?php

namespace Api\Base\Http\Requests;

use Api\Base\Traits\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class MainRequest extends FormRequest
{
    use ApiResponseTrait;


    protected function failedValidation(Validator $validator)
    {
       return  throw new HttpResponseException( $this->errorResponse($validator->errors() , 422));
//        parent::failedValidation($validator); // TODO: Change the autogenerated stub
    }
}

<?php

namespace Crm\Base;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class BaseApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    abstract public function rules(); 
 

     protected function failedValidation(Validator $validator)
    {
        $errors =(new ValidationException($validator))->errors();
        if(!empty($errors)){
         throw new HttpResponseException(
            response()->json(
                [
                  'status'=>'error',
                  'errors'=>$errors,
                ],
                JsonResponse::HTTP_BAD_REQUEST
            )
            );
        }
        

    }

   
}

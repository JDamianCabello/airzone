<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;


class CategoryStoreRequest extends FormRequest
{
    public function rules(){
        return [
            'parent_id' => 'integer|nullable|digits:11',
            'name' => 'string|min:3|max:128|required',
            'slug' => 'string|min:3|max:128|required',
            'visible' => 'integer|between:0,1|required'
        ];
    }

    public function failedValidation(Validator $validator): JsonResponse{
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}

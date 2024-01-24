<?php

namespace App\Http\Requests\Api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;


class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content'     => 'required|min:3',
            'feedback_id' => 'required|exists:feedbacks,id',
        ];
    }


    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status'  => 'error',
                'message' => 'Validation failed',
                'errors'  => $validator->errors(),
            ], JsonResponse::HTTP_UNAUTHORIZED)
        );
    }
}

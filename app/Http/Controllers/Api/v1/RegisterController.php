<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\RegisterRequest;
use App\Models\User;
use DB;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;


class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        try
        {
            DB::beginTransaction();

            unset($request['password_confirmation']);

            $new_user = User::create($request->validated());
            $api_token = $new_user->createToken('Auth Api Token')->plainTextToken;

            DB::commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'User registered successfully',
                'token'   => $api_token
            ], JsonResponse::HTTP_OK);

        } catch (\Throwable $e)
        {
            DB::rollBack();

            throw new HttpResponseException(
                response()->json([
                    'status'  => 'error',
                    'message' => 'Registration failed.',
                    'errors'  => $e->getMessage(),
                ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
            );
        }
    }
}

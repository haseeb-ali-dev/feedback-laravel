<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Auth;


class LoginController extends Controller
{

    public function __invoke(LoginRequest $request)
    {
        try
        {
            $authenticated = Auth::attempt($request->validated());
            if (!$authenticated)
            {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Invalid credentials.',
                ], JsonResponse::HTTP_UNAUTHORIZED);
            }

            $user = User::where('email', $request->email)->first();
            $api_token = $user->createToken('Login API Token')->plainTextToken;

            return response()->json([
                'status'       => 'success',
                'message'      => 'User logged in successfully',
                'access_token' => $api_token
            ], JsonResponse::HTTP_OK);

        } catch (\Throwable $e)
        {
            throw new HttpResponseException(
                response()->json([
                    'status'  => 'error',
                    'message' => 'Login failed.',
                    'errors'  => $e->getMessage(),
                ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR)
            );
        }


    }
}

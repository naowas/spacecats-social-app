<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    public function authenticateApiUser(Request $request): JsonResponse
    {
        $request->validate([
            'email_phone' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $field = filter_var($request->input('email_phone'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if (!Auth::attempt([$field => $request->input('email_phone'), 'password' => $request->input('password')], $request->boolean('remember'))) {

            return response()->json([
                'status' => 403,
                'message' => 'Username password mismatch',
            ], 403);
        }

        $user = User::query()
            ->where('email', $request->email_phone)
            ->orwhere('phone', $request->email_phone)
            ->first();

        return $this->apiSuccess([
            'token' => $user->createToken('Auth token '.$user->username, ['*'], Carbon::now()->addMinutes(30))->plainTextToken,
//            'expires_at' => Carbon::now()->addMinutes(30),
        ]);

    }

    protected function apiSuccess($data, $message = null, $code = 200): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => 'Request was successful...',
            'data' => $data,
        ], $code);
    }

    protected function apiError($data, $message, $code): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => 'Error occurred...',
            'data' => $data,
        ], $code);
    }
}

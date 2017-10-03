<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use JWTAuthException;
use App\User;
class ApiAuthController extends Controller
{
    public function authenticate(Request $request){
    	$credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);
    }

    public function register(){
    	$email = request()->email;
    	$name = request()->name;
    	$password = request()->password;

    	$user = User::create([
    		'name' => $name,
    		'email' => $email,
    		'password' => bcrypt($password)
    		]);

    	$token = JWTAuth::fromUser($user);

    	return response()->json(['token' => $token], 200);
    }
}

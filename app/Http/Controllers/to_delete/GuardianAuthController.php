<?php

namespace App\Http\Controllers\to_delete;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Guardian;
use Illuminate\Support\Str;

class GuardianAuthController extends Controller
{
    private $guardian;

    public function __construct(Guardian $guardian)
    {
        $this->guardian = $guardian;
    }


public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'full_name' => 'required|string',
        'email' => 'required|string|email|unique:guardians',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $guardianData = $request->only('full_name', 'email', 'password');
    $guardianData['password'] = Hash::make($guardianData['password']);

    $guardian = Guardian::create($guardianData);

    if ($guardian) {
        
        return response()->json([
            'message' => 'Successfully registered',
            'status' => true,
            'parent_id' => $guardian->id
        ], 201);
    } else {
        return response()->json(['status' => false]);
    }
}



    
    
      

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8',
            'email' => 'required|string|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (!$token = auth()->guard('guardian-api')->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect email or password. Please try again.'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'status' => true
        ]);
    }

    public function logout()
    {
        auth()->guard('guardian-api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

}

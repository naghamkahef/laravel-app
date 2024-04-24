<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use Illuminate\Support\Str; // Add this line to import Str class

class StudentAuthController extends Controller
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|string|email|unique:students',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $studentData = $request->only('full_name', 'email', 'password','parent_id');
        $studentData['password'] = Hash::make($studentData['password']);


        $student = Student::create($studentData);

        if ($student) {
           

            return response()->json([
                'message' => 'Successfully registered',
                'status' => true,
                'student_id' => $student->id
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

        if (!$token = auth()->guard('student-api')->attempt($credentials)) {
            if (!$token = auth()->guard('student-api')->attempt($credentials)) {
                // If authentication fails, return an error message indicating incorrect credentials.
                return response()->json(['error' => 'Incorrect email or password. Please try again.'], 401);
            }
        }

        return response()->json([
            'access_token' => $token,
            'status' => true
        ]);
    }

    public function logout()
    {
        auth()->guard('student-api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    

}

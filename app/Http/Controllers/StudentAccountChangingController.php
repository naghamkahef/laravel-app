<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class StudentAccountChangingController extends Controller
{
    public function updateName(Request $request)
    {
     $validator = Validator::make($request->all(), [
         'full_name' => 'required|string',
     ]);
 
     if ($validator->fails()) {
         return response()->json(['error' => $validator->errors()], 422);
     }
 
     $student = auth()->guard('student-api')->user();
 
     if (!$student) {
         return response()->json(['error' => 'Unauthorized'], 401);
     }
 
     $student->full_name = $request->input('full_name');
     $student->save();
 
     return response()->json([
         'message' => 'Name updated successfully',
         'status' => true
     ]);
 }
 public function updatePassword(Request $request)
{
    $validator = Validator::make($request->all(), [
        'old_password' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    $student = auth()->guard('student-api')->user();

    if (!$student) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    if (!Hash::check($request->input('old_password'), $student->password)) {
        return response()->json(['error' => 'Incorrect old password'], 422);
    }

    $student->password = Hash::make($request->input('password'));
    $student->save();

    return response()->json([
        'message' => 'Password updated successfully',
        'status' => true
    ]);
}
}

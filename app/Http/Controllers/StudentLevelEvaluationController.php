<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Evaluation;
use Illuminate\Support\Facades\Validator;

class StudentLevelEvaluationController extends Controller
{
    public function getMarkForLevel($studentId, $levelId)
    {
        // Retrieve the mark for the given student and level
        $evaluation = Evaluation::where('student_id', $studentId)
                                ->where('level_id', $levelId)
                                ->value('evaluation');

        if ($evaluation !== null) {
            return response()->json(['evaluation' => $evaluation]);
        } else {
            return response()->json(['error' => 'evaluation not found for the given student and level.'], 404);
        }
    }
    public function store(Request $request)
{
    // Check if the user is authenticated
    if (!Auth::guard('student-api')->check()) {
        // User is not authenticated, return a response indicating that authentication is required
        return response()->json(['error' => 'Authentication is required to store the evaluation.'], 401);
    }

    // Validation
    $validator = Validator::make($request->all(), [
        'level_id' => 'required|exists:levels,id',
        'evaluation' => 'required|string', // You might need more validation here depending on your requirements
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    // Create a new evaluation instance
    $evaluation = new Evaluation();
    $evaluation->student_id = Auth::guard('student-api')->user()->id;
    $evaluation->level_id = $request->level_id;
    $evaluation->evaluation = $request->evaluation;
    
    // Save the evaluation
    $evaluation->save();

    // Return a success response
    return response()->json(['message' => 'Evaluation stored successfully'], 201);
}

}

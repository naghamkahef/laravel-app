<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use customs\services\SendEmailService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str; // Add this line to import Str class
use App\models\EmailVerificationToken;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailVerificationNotification;
use App\Models\User;

use function PHPSTORM_META\map;

class StudentAuthController extends Controller
{
    private $student;
    //private $service;

    public function __construct(Student $student)
    {
        $this->student = $student;
       
         
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'email' => 'required|string|email|unique:students',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $studentData = $request->only('full_name', 'email', 'password');
        $studentData['password'] = Hash::make($studentData['password']);


        $student = Student::create($studentData);
        

        if ($student) {
            $this->sendVerificationLink($student);
           

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
            //return response()->json([$token]);
        }
       // return response()->json([$token]);

        return response()->json([
            'access_token' => $token,
            'status' => "true"
        ]);
    }

    public function logout()
    {
        auth()->guard('student-api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    public function sendVerificationLink($student){
        Notification::send($student,new EmailVerificationNotification($this->generateVerificationLink($student->email)));
    }

    public function generateVerificationLink($email){
        $checkIfTokenExists = EmailVerificationToken::where('email',$email)->first();
        if($checkIfTokenExists) 
        $checkIfTokenExists->delete();
    $token = Str::uuid();
    $url = config('app.url').':8000/api/verifyEmail'. "?token=". $token . "&email=".$email;
    $saveToken = EmailVerificationToken::create([
        "email" => $email,
        "token" => $token,
       // "expired_at" => now()->addMinutes(60) 
    ]); 
    if($saveToken){
        return $url;
    }
    }
    public function verifyEmail(Request $request){
        $student = Student::where('email',$request->input('email'))->first();
        if(!$student){
            return response()->json([
                'message' => 'email is not found',
                'status' => 'failed'
            ]);
        }
        if($student->hasVerifiedEmail()){
            return response()->json([
                'message' => 'student has been already verifed',
                'status' => 'false'
            ]);   
        }
        $student->markEmailAsVerified();
        $token = EmailVerificationToken::where('token',$request->input('token'));
        $token->delete();
        
       return redirect('http://localhost:3000/login');
        //return response()->json([
          //  'message' => 'student has been verified successfully',
            //'status' => 'success'
        //]);




    }
    public function stu(Request $request){
        $s = Character::where('character','أ')->first();
        $link = $s->Char_first;
        return response()->json([
            'link' => asset("$link")
        ]);
       
    }
    

}

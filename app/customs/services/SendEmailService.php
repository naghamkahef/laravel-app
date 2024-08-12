<?php 
namespace customs\services;

use App\Models\EmailVerificationToken;
use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class SendEmailService{

    public function sendVerificationLink($student){
        Notification::send($student,new EmailVerificationNotification($this->generateVerificationLink($student->email)));
    }

    public function generateVerificationLink($email){
        $checkIfTokenExists = EmailVerificationToken::where('email',$email)->first();
        if($checkIfTokenExists) 
        $checkIfTokenExists->delete();
    $token = Str::uuid();
    $url = config('app.url'). "?token=". $token . "&email=".$email;
    $saveToken = EmailVerificationToken::create([
        "email" => $email,
        "token" => $token,
        "expired_at" => now()->addMinutes(60) 
    ]); 
    if($saveToken){
        return $url;
    }
    } 

}
@component('mail::message')
# Email Verification

Hello {{ $guardian->full_name }},

Thank you for registering! Please click the button below to verify your email address.

@component('mail::button', ['url' => route('verification.verify', $guardian->id)])
Verify Email
@endcomponent

If you did not create an account, no further action is required.

Thanks,<br>
{{ config('app.name') }}
@endcomponent

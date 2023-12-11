<!doctype html>
<html lang="en">
    <body>
        <h1>User email Verification</h1>
        <p> Hello {{$user->name}} </p>
        <p>Please click the button below to verify your email address</p>
        <a href="{{ URL::temporarySignedRoute('verification.verify', now()->addMinutes(30), ['id' => $user->id]) }}" class="button button-primary" target="_blank">
            Verify Email Address
        </a>
    </body>
</html>

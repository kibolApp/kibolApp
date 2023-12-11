<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    Mail::to('projectkibolapp@gmail.com')->send(new contactUsMail($validatedData));

    return response()->json(['message' => 'Email sent successfully']);
}
}

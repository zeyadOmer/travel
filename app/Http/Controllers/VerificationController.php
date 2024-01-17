<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    //
    public function verify($token)
{
    $user = User::where('email_verification_token', $token)->first();

    if (!$user) {
        abort(404, 'User not found or already verified.');
    }

    $user->markEmailAsVerified();
    $user->update(['email_verification_token' => null]);

    return redirect('/')->with('success', 'Email verified successfully!');
}
}

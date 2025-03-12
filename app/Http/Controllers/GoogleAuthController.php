<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    // Redirect to Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle Google Callback
    public function callback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Check if email is from @moh.gov.my
        if (!str_ends_with($googleUser->email, '@moh.gov.my')) {
            return redirect('/login')->withErrors(['email' => 'Only @moh.gov.my emails are allowed.']);
        }

        // Check if user exists
        $user = User::where('email', $googleUser->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect('/');
        }

        // If new user, ask for username before signup
        session([
            'google_name' => $googleUser->name,
            'google_email' => $googleUser->email,
            'google_id' => $googleUser->id,
        ]);

        return redirect()->route('complete.registration.post');

    }

    // Handle Final Registration
    public function completeRegistration(Request $request)
    {


        Log::info('Complete Registration Method:', ['method' => $request->method()]);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create User
        $user = User::create([
            'name' => $request->name,
            'email' => session('google_email'),
            'google_id' => session('google_id'),
            'password' => bcrypt('random-password'), // Placeholder password
        ]);

        // Log in user
        Auth::login($user);
        return redirect('/')->with('success', 'Registration completed!');
    }
}

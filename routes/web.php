<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

// ✅ Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'index'])->name('search');

// ✅ Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// ✅ Google Authentication
Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// ✅ Complete Registration (Fix)
Route::get('/complete-registration', function () {
    return view('auth.complete-registration');
})->name('complete.registration');

Route::post('/complete-registration', [GoogleAuthController::class, 'completeRegistration'])->name('complete.registration.post');

// ✅ Profile Routes (Ensure Authenticated)
Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.view');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Matchmaking System (Ensure Authenticated)
Route::middleware('auth')->group(function () {
    Route::post('/match/{id}', [MatchController::class, 'sendMatchRequest'])->name('match.send');
    Route::get('/matchlist/sent', [MatchController::class, 'sentMatches'])->name('matchlist.sent');
    Route::get('/matchlist/received', [MatchController::class, 'receivedMatches'])->name('matchlist.received');
    Route::post('/match/{id}/accept', [MatchController::class, 'acceptMatch'])->name('match.accept');
    Route::post('/match/{id}/decline', [MatchController::class, 'declineMatch'])->name('match.decline');
    Route::get('/matchlist/successful', [MatchController::class, 'successfulMatches'])->name('matchlist.successful');
});

// ✅ Dashboard (Optional)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

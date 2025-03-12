<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
    
        // Retrieve unique skim values from the users table
        $skims = User::distinct()->pluck('skim');
    
        return view('profile.edit', compact('user', 'skims'));
    }
    

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'skim' => 'required|string|max:50',
            'gred' => 'required|integer|min:5|max:12',
            'negeri' => 'required|string|max:100',
            'experience' => 'nullable|string',
            'fasiliti' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'reason_transfer' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        

       // dd($request->all());  Debugging: Check if the form sends the correct data
        // Update user data
        $user = Auth::user();

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image
        ]);
    
        // Check if a new photo is uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
    
            // Store the new photo in 'public/uploads' and get the file path
            $photoPath = $request->file('photo')->store('uploads', 'public');
    
            // Save the new file path in the database
            $user->photo = $photoPath;
        }
        $user->name = $request->name;
        $user->skim = $request->skim;
        $user->gred = $request->gred;
        $user->negeri = $request->negeri;
        $user->experience = $request->experience;
        $user->fasiliti = $request->fasiliti;
        $user->jabatan = $request->jabatan;
        $user->reason_transfer = $request->reason_transfer;
    
        // Handle profile picture upload
       
    
        $user->save();
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    
    

    public function show($id)
{
    $user = User::findOrFail($id); // Get user details by ID

    return view('profile', compact('user')); // Pass user data to profile page
}

    /**
     * Delete the user's account.
     * 
     * 
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

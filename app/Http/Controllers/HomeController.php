<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        return view('home'); // No authentication required

        // Get distinct values for Skim, Gred, and Negeri from the users table
        $skims = User::select('skim')->distinct()->whereNotNull('skim')->get();
        $greds = User::select('gred')->distinct()->whereNotNull('gred')->orderBy('gred', 'asc')->get();
        $negeris = User::select('negeri')->distinct()->whereNotNull('negeri')->get();

        // Search functionality
        $query = User::query();

        if ($request->has('skim') && $request->skim != '') {
            $query->where('skim', $request->skim);
        }
        if ($request->has('gred') && $request->gred != '') {
            $query->where('gred', $request->gred);
        }
        if ($request->has('negeri') && $request->negeri != '') {
            $query->where('negeri', $request->negeri);
        }

        // Get filtered users
        $users = $query->get();

        // Pass all data to the home view
        return view('home', compact('skims', 'greds', 'negeris', 'users'));
        
    }
}

$user = User::where('id', auth()->id())->first(); // Retrieve user object
return view('profile', ['user' => $user]);

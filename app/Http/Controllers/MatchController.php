<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMatch;

class MatchController extends Controller
{
    // Send a match request
    public function sendMatchRequest($matched_id)
    {
        $matcher_id = Auth::id(); // Get logged-in user ID

        // Check if match already exists
        if (UserMatch::where('matcher_id', $matcher_id)->where('matched_id', $matched_id)->exists()) {
            return back()->with('error', 'You have already sent a match request.');
        }

        UserMatch::create([
            'matcher_id' => $matcher_id,
            'matched_id' => $matched_id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Match request sent.');
    }

    // List of sent match requests
    public function sentMatches()
    {
        $matchesSent = UserMatch::where('matcher_id', auth()->id())->with('matchedUser')->get();
        return view('matchlist.sent', compact('matchesSent'));
    }
    
    // List of received match requests
    public function receivedMatches()
    {
        $matchesReceived = UserMatch::where('matched_id', auth()->id())->with('matcherUser')->get();
        return view('matchlist.received', compact('matchesReceived'));
    }

    // Accept a match request
    public function acceptMatch($id)
    {
        $match = UserMatch::findOrFail($id);
        $match->update(['status' => 'accepted']);

        return back()->with('success', 'Match accepted! Awaiting HOD approval.');
    }

    // Decline a match request
    public function declineMatch($id)
    {
        $match = UserMatch::findOrFail($id);
        $match->delete();

        return back()->with('success', 'Match request declined.');
    }

    // View successful matches
    public function successfulMatches()
    {
        $matches = UserMatch::where(function ($query) {
            $query->where('matcher_id', Auth::id())->orWhere('matched_id', Auth::id());
        })->where('status', 'accepted')->get();

        return view('matchlist.successful', compact('matches'));
    }
}

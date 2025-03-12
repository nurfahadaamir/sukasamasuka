@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center">My Match List</h2>

    <!-- Pending Matches Sent -->
    <h3>Pending Matches (Requests You Sent)</h3>
    @if($matchesSent->isNotEmpty())
        <ul>
            @foreach ($matchesSent as $match)
                <li>Matched with: <strong>{{ $match->matched->name ?? 'Unknown' }}</strong> - <span class="text-warning">Pending</span></li>
            @endforeach
        </ul>
    @else
        <p>No match requests sent.</p>
    @endif

    <hr>

    <!-- Pending Matches Received -->
    <h3>Pending Matches (Requests You Received)</h3>
    @if($matchesReceived->isNotEmpty())
        <ul>
            @foreach ($matchesReceived as $match)
                <li>
                    Match Request from: <strong>{{ $match->matcher->name ?? 'Unknown' }}</strong>
                    
                    <form action="{{ route('match.accept', $match->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>

                    <form action="{{ route('match.decline', $match->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Decline</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>No match requests received.</p>
    @endif
</div>

@endsection

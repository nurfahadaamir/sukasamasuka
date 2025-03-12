@extends('layouts.app')

@section('title', 'Received Matches')

@section('content')
<div class="container">
    <h2>Incoming Match Requests</h2>
    @if($matchesReceived->isNotEmpty())
        <ul>
            @foreach ($matchesReceived as $match)
                <li>
                    Match Request from: <strong>{{ $match->matcherUser->name ?? 'Unknown' }}</strong>
                    <!-- Accept Button -->
                    <form action="{{ route('match.accept', $match->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                    <!-- Decline Button -->
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

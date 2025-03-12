@extends('layouts.app')

@section('title', 'Sent Matches')

@section('content')
<div class="container">
    <h2>Pending Matches (Requests You Sent)</h2>
    @if($matchesSent->isNotEmpty())
        <ul>
            @foreach ($matchesSent as $match)
                <li>
                    Matched with: <strong>{{ $match->matchedUser->name ?? 'Unknown' }}</strong> - {{ $match->status }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No match requests sent.</p>
    @endif
</div>
@endsection
@extends('layouts.app')

@section('title', 'Sent Matches')

@section('content')
<div class="container">
    <h2>Pending Matches (Requests You Sent)</h2>
    @if($matchesSent->isNotEmpty())
        <ul>
            @foreach ($matchesSent as $match)
                <li>
                    Matched with: <strong>{{ $match->matchedUser->name ?? 'Unknown' }}</strong> - {{ $match->status }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No match requests sent.</p>
    @endif
</div>
@endsection

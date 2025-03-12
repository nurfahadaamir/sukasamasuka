@extends('layouts.app')

@section('title', 'Successful Matches')

@section('content')
<div class="container">
    <h2>Successful Matches</h2>
    @if($matches->isNotEmpty())
        <ul>
            @foreach ($matches as $match)
                <li>
                    Successfully Matched with: <strong>
                        {{ $match->matchedUser->name ?? $match->matcherUser->name ?? 'Unknown' }}
                    </strong>
                    - Status: {{ $match->status }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No successful matches yet.</p>
    @endif
</div>
@endsection

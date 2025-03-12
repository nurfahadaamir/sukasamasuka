@extends('layouts.app')

@section('title', 'Complete Registration')

@section('content')


<div class="container">
    <h2>Complete Your Registration</h2>
    <form action="{{ route('complete.registration.post') }}" method="POST">
        @csrf
        <button type="submit">Complete Registration</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">{{ $user->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="section-title text-center mb-3">{{ $user->name }}</h2>
            </div>
        </div>

        <div class="row align-items-stretch">
            <!-- Profile Image -->
            <div class="col-lg-4 order-lg-1">
                <div class="h-100">
                    <div class="frame h-100">
                        <div class="feature-img-bg h-100">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/images/default-profile.png') }}" alt="Default Profile Photo" class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <h3>Basic Information</h3>
                        <p class="mb-0"><strong>Nama:</strong> {{ $user->name }}</p> 
                        <p class="mb-0"><strong>Skim:</strong> {{ $user->skim }}</p>
                        <p class="mb-0"><strong>Gred:</strong> {{ $user->gred }}</p>
                        <p class="mb-0"><strong>Negeri:</strong> {{ $user->negeri }}</p>
                    </div>
                </div>

                <!-- Pengalaman -->
                <div class="feature-1">
                    <div class="align-self-center">
                        <h3>Pengalaman</h3>
                        <p class="mb-0">{{ $user->experience ?? 'Tiada Maklumat' }}</p>
                    </div>
                </div>
            </div>

            <!-- Penempatan Semasa & Sebab Perpindahan -->
            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <h3>Penempatan Semasa</h3>
                        <p class="mb-0"><strong>Fasiliti:</strong> {{ $user->fasiliti ?? 'Tiada Maklumat' }}</p>
                        <p class="mb-0"><strong>Jabatan:</strong> {{ $user->jabatan ?? 'Tiada Maklumat' }}</p>
                    </div>
                </div>

                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <h3>Sebab Perpindahan</h3>
                        <p class="mb-0">{{ $user->reason_transfer ?? 'Tiada Maklumat' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(auth()->user()->id !== $user->id) <!-- Prevent self-matching -->
    <form action="{{ route('match.send', $user->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Match</button>
    </form>
@endif

<a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>
@endsection

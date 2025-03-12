@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="intro-wrap">
                    <h1 class="mb-5"><span class="d-block">Suka</span> Sama <span class="typed-words"></span></h1>
                    <p style="color: white;">
                        <img src="{{ asset('assets/images/moh-logo.png') }}" style="height: 40px; margin-right: 10px;">
                        Di bawah oleh KEMENTERIAN KESIHATAN MALAYSIA
                    </p>

                    <form action="{{ route('search') }}" method="GET" class="mb-4">
    <div class="row mb-2">
        <!-- Skim Dropdown -->
        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
            <select name="skim" class="form-control custom-select">
                <option value="">Skim :</option>
                @foreach ($skims as $skim)
                    <option value="{{ $skim->skim }}">{{ $skim->skim }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gred Dropdown -->
        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
            <select name="gred" class="form-control custom-select">
                <option value="">Gred :</option>
                @foreach ($greds as $gred)
                    <option value="{{ $gred->gred }}">{{ $gred->gred }}</option>
                @endforeach
            </select>
        </div>

        <!-- Negeri Dropdown -->
        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
            <select name="negeri" class="form-control custom-select">
                <option value="">Negeri :</option>
                @foreach ($negeris as $negeri)
                    <option value="{{ $negeri->negeri }}">{{ $negeri->negeri }}</option>
                @endforeach
            </select>
        </div>
    </div>    

    <!-- Search Button -->
    <div class="row align-items-center">
        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
            <button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>
</form>


                </div>
            </div>
        </div>
    </div>
</div>



<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-6">
                <h2 class="section-title text-center mb-3">Hasil Carian</h2>
                <p>Hasil carian profil berdasarkan ciri - ciri yang anda telah tetapkan</p>
            </div>
        </div>

        <div class="row">
            @forelse($users as $user)
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <a href="#" class="d-block mb-3">
                            @if($user->photo)
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Image" class="img-fluid">
                            @else
                                <img src="{{ asset('assets/images/default-profile.png') }}" alt="Image" class="img-fluid">
                            @endif
                        </a>
                        <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>{{ $user->fasiliti }}</span>
                        </span>
                        <div class="d-flex align-items-center">
                            <div>
                                <h3><a href="#">{{ $user->name }}</a></h3>
                                <div class="price ml-auto">
                                    <span>{{ $user->skim }}</span>
                                </div>
                                <div class="price ml-auto">
                                    <span>UD {{ $user->gred }}</span>
                                </div>
                                <div class="profile">
                                <a href="{{ route('profile.view', ['id' => $user->id]) }}" class="btn btn-primary btn-block">
                                  Lihat Profil
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Tiada hasil carian.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection

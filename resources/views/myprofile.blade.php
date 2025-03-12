@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">My Profile</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="section-title text-center mb-3">{{ Auth::user()->name }}</h2>
            </div>
        </div>

        <div class="row align-items-stretch">
            <div class="col-lg-8 mx-auto">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <h3>Basic Information</h3>

                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <!-- Profile Photo -->
                            <div class="text-center mb-3">
                                @if(Auth::user()->photo)
                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile Picture" class="rounded-circle" style="height: 120px; width: 120px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('assets/images/default-profile.png') }}" alt="Default Profile Picture" class="rounded-circle" style="height: 120px; width: 120px; object-fit: cover;">
                                @endif
                            </div>

                            <label for="photo">Upload New Profile Picture:</label>
                            <input type="file" id="photo" name="photo" class="form-control mb-3">

                            <!-- Name -->
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}" required>

                            <!-- Skim -->
                            <label for="skim">Skim:</label>
                            <select id="skim" name="skim" class="form-control" required>
                                <option value="Pegawai Perubatan" {{ Auth::user()->skim == 'Pegawai Perubatan' ? 'selected' : '' }}>Pegawai Perubatan</option>
                                <option value="Pakar" {{ Auth::user()->skim == 'Pakar' ? 'selected' : '' }}>Pakar</option>
                                <option value="Jururawat" {{ Auth::user()->skim == 'Jururawat' ? 'selected' : '' }}>Jururawat</option>
                            </select>

                            <!-- Gred -->
                            <label for="gred">Gred:</label>
                            <select id="gred" name="gred" class="form-control" required>
                                @for ($i = 5; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ Auth::user()->gred == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>

                            <!-- Negeri -->
                            <label for="negeri">Negeri:</label>
                            <select id="negeri" name="negeri" class="form-control" required>
                                <option value="Selangor" {{ Auth::user()->negeri == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                <option value="Putrajaya" {{ Auth::user()->negeri == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                                <option value="Kuala Lumpur" {{ Auth::user()->negeri == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                <option value="Kedah" {{ Auth::user()->negeri == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                            </select>

                            <hr>

                            <label for="experience">Pengalaman:</label>
                            <textarea id="experience" name="experience" class="form-control" rows="4">{{ Auth::user()->experience }}</textarea>

                            <label for="reason_transfer">Sebab Perpindahan:</label>
                            <textarea id="reason_transfer" name="reason_transfer" class="form-control" rows="4">{{ Auth::user()->reason_transfer }}</textarea>

                            <hr>

                            <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

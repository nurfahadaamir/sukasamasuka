<header class="site-header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 50px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ url('/matchlist') }}" class="nav-link">Match List</a></li>
                    <li class="nav-item"><a href="{{ url('/myprofile') }}" class="nav-link">My Profile</a></li>
                    
                    @auth
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>

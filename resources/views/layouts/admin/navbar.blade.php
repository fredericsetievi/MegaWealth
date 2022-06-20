<nav class="navbar navbar-expand-lg" style="background-color: #0e185f;">
    <div class="container-fluid">
        <a class="navbar-brand link-light" href="/">megAWealth</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">=</span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link link-light" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('manageOfficePage') }}">Manage Company</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('manageRealEstatePage') }}">Manage Real Estate
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

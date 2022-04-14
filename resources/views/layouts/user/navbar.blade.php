<nav class="navbar navbar-expand-lg" style="background-color: #0e185f;">
    <div class="container-fluid">
        <a class="navbar-brand link-light" href="/">megAWealth</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">=</span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="color: #354696">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link link-light" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link-light" href="#">About Us</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link-light" href="#">Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-light" href="#">Rent</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link link-light" href="#">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('loginPage') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('registerPage') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

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
                    <a class="nav-link link-light" href="{{ route('homePage') }}">Home</a>
                </li>

                @if (!Gate::allows('isAdmin'))
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('aboutUsPage') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('buyPage') }}">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('rentPage') }}">Rent</a>
                    </li>
                @endif

                @if (Gate::allows('isMember'))
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('cartPage') }}">Cart</a>
                    </li>
                @elseif(Gate::allows('isAdmin'))
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('manageOfficePage') }}">Manage Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('manageRealEstatePage') }}">Manage Real Estate
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('loginPage') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('registerPage') }}">Register</a>
                    </li>
                @endauth

                @if (Gate::allows('isAdmin') || Gate::allows('isMember'))
                    <li class="nav-item">
                        <a class="nav-link link-light" href="javascript:void(0);"
                            onclick="document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                    </form>
                @endif
        </ul>
    </div>
</div>
</nav>

{{-- prosedur untuk menampilkan menu --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Latihan Laravel 9</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'companies' == request()->path() ? 'active' : '' }}"
                        href="{{ url('/companies') }}">Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'employees' == request()->path() ? 'active' : '' }}"
                        href="{{ url('/employees') }}">Employees</a>
                </li>

                @if (auth()->user()->level == 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ 'users' == request()->path() ? 'active' : '' }}"
                            href="{{ url('/users') }}">User</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- prosedur untuk menampilkan beranda --}}
{{-- <title>Beranda</title>
<div class="container-fluid">
    <div class="alert alert-dark mt-2" role="alert">
        Selamat Datang Di Latihan LSP Berbasis Website<br>
        Nama: Feri Nikolas Tenis
        <hr>
        Latihan LSP Klaster 2 Pemrograman Web
    </div>
</div> --}}

{{-- prosedur untuk menampilkan footer

<div class="alert alert-primary mt-4" role="alert" align="center">
    &copy Latihan LSP RPL SMKN 1 SUKAWATI
    <script>
        document.write(new Date().getFullYear());
    </script>
</div> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Perpus</title>

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <div class="left-section">
        <div class="web-logo d-flex flex-row align-items-center my-3 mx-auto">
            <i class="fa-solid fa-book-open" style="font-size: 3vh; color: white;"></i>
            <h3 class="pl-2 m-auto text-light">PERPUS</h3>
        </div>
        <div class="content-nav mt-3" style="color: white;">
            <ul class="list-nav" style="list-style: none">
                <li class="nav-con"><i class="fa-solid fa-folder-open "></i><a href="{{ route('admin.dashboard') }}"
                        class="ml-0.5">Dashboard</a></li>
                <li class="nav-type">MASTER DATA</li>
                <li class="nav-con"><i class="fa-solid fa-users"></i><a href="{{ route('admin.anggota') }}"
                        class="ml-0.5">Data Anggota</a>
                </li>
                <li class="nav-con"><i class="fa-solid fa-user-pen"></i></i><a href="{{ route('admin.penerbit') }}"
                        class="ml-0.5">Data Penerbit</a>
                </li>
                <li class="nav-con"><i class="fa-solid fa-user-secret"></i><a href="{{ route('admin.admin') }}"
                        class="ml-0.5">Data Admin</a>
                </li>
                <li class="nav-con"><i class="fa-solid fa-bookmark"></i></i><a href="{{ route('admin.peminjaman') }}"
                        class="ml-0.5">Data Peminjaman</a>
                </li>
                <li class="nav-type">KATALOG BUKU</li>
                <li class="nav-con"><i class="fa-solid fa-book"></i><a href="{{ route('admin.buku') }}"
                        class="ml-0.5">Buku</a>
                </li>
                <li class="nav-con"><i class="fa-solid fa-hashtag"></i><a href="{{ route('admin.kategori') }}"
                        class="ml-0.5">Kategori</a>
                </li>
                <li class="nav-type">PESAN</li>
                <li class="nav-con"><i class="fa-solid fa-inbox"></i><a href="{{ route('inbox') }}" class="ml-0.5">Inbox
                        {{-- Kalau user tidak ada pesan, tidak ada pop-up inbox --}}
                        @if (Auth::user()->pesan_diterima->where('status', '=', 'terkirim')->count() == 0)
                    </a>
                </li>
            @else
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                    {{ Auth::user()->pesan_diterima->where('status', '=', 'terkirim')->count() }}</span>
                </a>
                </li>
                @endif
                </li>
                <li class="nav-con"><i class="fa-solid fa-message"></i><a href="{{ route('pesan.terkirim') }}"
                        class="ml-0.5">Pesan Terkirim</a>
                </li>
                <li class="nav-type">LAINNYA</li>
                <li class="nav-con"><i class="fa-solid fa-file-lines"></i><a href="{{ route('admin.laporan') }}"
                        class="ml-0.5">Laporan
                        Perpustakaan</a>
                </li>
                <li class="nav-con"><i class="fa-solid fa-tablet-screen-button"></i></i><a
                        href="{{ route('admin.identitas') }}" class="ml-0.5">Identitas Aplikasi</a>
                </li>
            </ul>
            <hr>
            <div class="logout align-items-center">
                <?php
                $today = getdate()['wday'];
                $hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                ?>
                <p>{{ $hari[$today] }}, {{ date('d-m-y h:i') }}</p>

            </div>
        </div>
    </div>
    <div class="top-bar align-items-center justify-content-end pr-2">
        <h5 class="m-0 text-white"><i class="fa-solid fa-envelope pr-3"></i> <i class="fa-solid fa-grip-lines-vertical pr-3"></i><a href="{{ route('logout') }}" class="text-white" style="text-decoration: none"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></h5>
    </div>
    <div class="right-section p-4">
        <div class="container mt-4">
            @yield('content')
        </div>
    </div>
</body>

</html>

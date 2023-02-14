<!DOCTYPE html>
<html>

<head>
    <title>Laporan Anggota Perpustakaan</title>

    <style>
        * {
            font-family: sans-serif;
        }
    </style>

    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div style="position:absolute; left:37px; top:15px; width:200px;">
        <img src="{{ public_path($identitas->foto) }}" width="35%" class="rounded-circle" alt="Logo Perpus" />
    </div>
    <center>
        <h1>{{ $identitas->nama_app }}</h1>
        <p>{{ $identitas->alamat }}</p>
        <p>{{ $identitas->email_app }} | {{ $identitas->nomor_hp }}</p>
        <hr>
        <h4 class="mt-4">-- Laporan Anggota Perpustakaan --</h4>
        <p>{{ $kolom }} | {{ $keyword }}</p>
    </center>
    @if ($anggotas->count() > 0)
        @foreach ($anggotas as $a)
            <h4>{{ $loop->index + 1 }}) {{ $a->username }} - {{ $a->fullname }}</h4>
            @if ($a->peminjamans->count() > 0)
                <table class="table table-bordered mt-2" style="table-layout: fixed;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center align-middle">No</th>
                            <th scope="col" class="text-center align-middle" colspan="2">Judul Buku</th>
                            <th scope="col" class="text-center align-middle" colspan="2">Tanggal Peminjaman</th>
                            <th scope="col" class="text-center align-middle" colspan="2">Tanggal Pengembalian</th>
                            <th scope="col" class="text-center align-middle">Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($a->peminjamans as $p)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td colspan="2">{{ $p->buku->judul_buku }}</td>
                                <td colspan="2" class="text-center">{{ $p->tanggal_peminjaman }}</td>
                                @if ($p->tanggal_pengembalian == null)
                                    <td colspan="2" class="text-center">-</td>
                                @else
                                    <td colspan="2" class="text-center">{{ $p->tanggal_pengembalian }}</td>
                                @endif
                                @if ($p->tanggal_pengembalian == null)
                                    <td class="text-center"></td>
                                @elseif($p->denda == null)
                                    <td class="text-center">-</td>
                                @else
                                    <td class="text-center">{{ $p->denda }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h5>Tidak pernah meminjam buku</h5>
            @endif
        @endforeach
    @else
        <center class="mt-2">
            <h2>-- Data Tidak Tersedia --</h2>
        </center>
    @endif
</body>

</html>

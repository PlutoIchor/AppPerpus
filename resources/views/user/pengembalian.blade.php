@extends('layouts.user')

@section('content')
        <h2><b>Riwayat Pengembalian</b></h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pengembalian</li>
            </ol>
        </nav>
        @if (\Session::has('successAdd'))
            <div class="alert alert-success d-flex align-items-center">
                {{ \Session::get('successAdd') }}
            </div>
        @endif
        <hr>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Buku</th>
                    <th scope="col" class="text-center">Tanggal Peminjaman</th>
                    <th scope="col" class="text-center">Tanggal Pengembalian</th>
                    <th scope="col" class="text-center">Kondisi Buku Saat Dipinjam</th>
                    <th scope="col" class="text-center">Kondisi Buku Saat Dikembalikan</th>
                    <th scope="col" class="text-center">Denda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalians as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->buku->judul_buku }}</td>
                        <td class="text-center">{{ $p->tanggal_peminjaman }}</td>
                        <td class="text-center">{{ $p->tanggal_pengembalian }}</td>
                        <td class="text-center">{{ $p->kondisi_buku_saat_dipinjam }}</td>
                        <td class="text-center">{{ $p->kondisi_buku_saat_dikembalikan }}</td>
                        @if ($p->denda == null)
                            <td class="text-success text-center">Tidak ada denda</td>
                        @else
                            <td class="text-danger text-center">{{ $p->denda }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection

@extends('layouts.user')

@section('content')
        <h2><b>Dashboard</b></h2>
        <div class="alert alert-secondary" role="alert">
            Selamat Datang {{ Auth::user()->fullname }}!
          </div>
        <hr>
        <div class="d-flex flex-row mt-4">
            @foreach ($bukus as $buku)
                <div class="col-4">
                    <div class="card border border-secondary" style="width: 18rem;">
                        <img src="{{ url('/img' . '/' . $buku->foto) }}" style="height: 200px;object-fit: cover;"
                            class="card-img" alt="{{ $buku->judul_buku }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $buku->judul_buku }}</b></h5>
                            <p>By : {{ $buku->pengarang }}</p>
                            <p>Kategori : {{ $buku->kategori->nama_kategori }}</p>
                            <p>Penerbit : {{ $buku->penerbit->nama_penerbit }}</p>
                            <a href="{{ url('user/form_peminjaman/'. $buku->id) }}" class="btn btn-secondary">Pinjam</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection

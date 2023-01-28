@extends('layouts.user')

@section('content')
    <div class="container">
        <h3>Dashboard</h3>
        <div class="d-flex flex-row mt-3">
            @foreach ($bukus as $buku)
                <div class="col-3">
                    <div class="card mr-4" style="width: 18rem;">
                        <img src="{{ url('/img' . '/' . $buku->foto) }}" style="height: 150px;object-fit: cover;"
                            class="card-img" alt="{{ $buku->judul_buku }}">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{ $buku->judul_buku }}</b></h5>
                            <p>By : {{ $buku->pengarang }}</p>
                            <p>Kategori : {{ $buku->kategori->nama_kategori }}</p>
                            <p>Penerbit : {{ $buku->penerbit->nama_penerbit }}</p>
                            <a href="#" class="btn btn-secondary">Pinjam</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

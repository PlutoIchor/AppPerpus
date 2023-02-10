@extends('layouts.user')

@section('content')
    <h2><b>Dashboard</b></h2>
    <div class="alert alert-secondary" role="alert">
        Selamat Datang , {{ Auth::user()->fullname }}!
    </div>
    @foreach ($kategoris as $k)
        @if ($k->bukus->count() > 0)
            <hr>
            <nav class="navbar navbar-light bg-light">
                <h3><b>{{ $k->nama_kategori }}</b></h3>
            </nav>
            <div class="d-flex flex-row mt-2">
                @foreach ($k->bukus->sortBy('judul_buku') as $buku)
                    @if ($loop->iteration % 4 == 1)
            </div>
            <div class="d-flex flex-row mt-2">
        @endif
        <div class="mr-4">
            <div class="card border border-secondary" style="width: 16rem;">
                <img src="{{ url('/img' . '/' . $buku->foto) }}" style="height: 200px;object-fit: cover;" class="card-img"
                    alt="{{ $buku->judul_buku }}" data-toggle="modal" data-target="#foto{{ $buku->id }}">
                <!-- Modal -->
                <div class="modal fade text-left " id="foto{{ $buku->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Foto {{ $buku->judul_buku }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <img src="{{ url('/img' . '/' . $buku->foto) }}"
                                        style="height: 450px;object-fit: cover;">
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>{{ $buku->judul_buku }}</b></h5>
                    <p>By : <a href="https://www.google.com/search?q={{ str_replace(' ', '_', $buku->pengarang) }}"
                            target="_blank">{{ $buku->pengarang }}</a></p>
                    <p>Penerbit : {{ $buku->penerbit->nama_penerbit }}</p>
                    <a href="{{ url('user/form_peminjaman/' . $buku->id) }}" class="btn btn-secondary">Pinjam</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif
    @endforeach
@endsection

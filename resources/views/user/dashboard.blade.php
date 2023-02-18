@extends('layouts.user')

@section('content')
    <h2><b>Dashboard</b></h2>
    <div class="alert alert-secondary" role="alert">
        Selamat Datang , {{ Auth::user()->fullname }}!
    </div>
    <hr>
    <nav class="navbar navbar-light bg-light">
        <h3><b><i class="fa-solid fa-fire"></i> Populer</b></h3>
    </nav>
    <div class="d-flex flex-column mt-2">
        @foreach ($top as $b)
            @if ($loop->index != 1)
                <div class="card mt-2">
                    <div class="card-body p-0 d-flex flex-row">
                        <div class="d-flex align-items-center justify-content-center px-4 border bg-danger text-white">
                            <h1>{{ $loop->index + 1 }}</h1>
                        </div>
                        <div class="d-flex w-100 flex-column align-items-center justify-content-center text-center">
                            <h2><b>{{ $b->judul_buku }}</b></h2>
                            <h5 class="text-muted">Oleh : {{ $b->pengarang }}, {{ $b->tahun_terbit }}</h5>
                            <div class="row">
                                <h5 class="mr-2"><span class="badge badge-info"><i class="fa-solid fa-hashtag"></i> {{ $b->kategori->nama_kategori }}</span>
                                    </h3>
                                </h5>
                                <h5 class="mr-2"><span class="badge badge-info"><i class="fa-solid fa-user-pen"></i> {{ $b->penerbit->nama_penerbit }}</span>
                                    </h3>
                                </h5>
                                <h5><span class="badge badge-info mr-2"><i class="fa-solid fa-book-bookmark"></i>
                                        {{ $b->peminjamans->count() }}</span></h3>
                                </h5>
                                @if ($b->j_buku_baik + $b->j_buku_rusak > 1)
                                    <h5><span class="badge bg-success text-white">Tersedia</span></h5>
                                @else
                                    <h5><span class="badge bg-danger text-white">Kosong</span></h5>
                                @endif
                            </div>
                            <h4 class="w-50"><a href="{{ url('user/form_peminjaman/' . $b->id) }}"
                                    class="badge badge-warning w-100"><i class="fa-solid fa-book-bookmark"></i> Pinjam</a></h4>
                        </div>
                        <img src="{{ url('/img' . '/' . $b->foto) }}" style="height: 150px; object-fit: cover;"
                            class="card-img border" alt="{{ $b->judul_buku }}" data-toggle="modal"
                            data-target="#foto{{ $b->id }}" />
                        <!-- Modal -->
                        <div class="modal fade text-left " id="foto{{ $b->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <center>
                                            <img src="{{ url('/img' . '/' . $b->foto) }}"
                                                class="rounded border border-4 p-1"
                                                style="height: 450px;object-fit: cover;">
                                            <h3 class="mt-2"><b>{{ $b->judul_buku }}</b></h3>
                                            <p>By : <a
                                                    href="https://www.google.com/search?q={{ str_replace(' ', '_', $b->pengarang) }}"
                                                    target="_blank">{{ $b->pengarang }}</a>, {{ $b->tahun_terbit }}</p>
                                            <p>Stok : <span class="text-info">{{ $b->j_buku_baik }} | <span
                                                        class="text-muted">{{ $b->j_buku_rusak }}</span></span></p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card mt-2">
                    <div class="card-body p-0 d-flex flex-row">
                        <img src="{{ url('/img' . '/' . $b->foto) }}" style="height: 150px; object-fit: cover;"
                            class="card-img border" alt="{{ $b->judul_buku }}" data-toggle="modal"
                            data-target="#foto{{ $b->id }}" />
                        <!-- Modal -->
                        <div class="modal fade text-left " id="foto{{ $b->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <center>
                                            <img src="{{ url('/img' . '/' . $b->foto) }}"
                                                class="rounded border border-4 p-1"
                                                style="height: 450px;object-fit: cover;">
                                            <h3 class="mt-2"><b>{{ $b->judul_buku }}</b></h3>
                                            <p>By : <a
                                                    href="https://www.google.com/search?q={{ str_replace(' ', '_', $b->pengarang) }}"
                                                    target="_blank">{{ $b->pengarang }}</a>, {{ $b->tahun_terbit }}</p>
                                            <p>Stok : <span class="text-info">{{ $b->j_buku_baik }} | <span
                                                        class="text-muted">{{ $b->j_buku_rusak }}</span></span></p>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex w-100 flex-column align-items-center justify-content-center text-center">
                            <h2><b>{{ $b->judul_buku }}</b></h2>
                            <h5 class="text-muted">Oleh : {{ $b->pengarang }}, {{ $b->tahun_terbit }}</h5>
                            <div class="row">
                                <h5 class="mr-2"><span class="badge badge-info"><i class="fa-solid fa-hashtag"></i> {{ $b->kategori->nama_kategori }}</span>
                                    </h3>
                                </h5>
                                <h5 class="mr-2"><span class="badge badge-info"><i class="fa-solid fa-user-pen"></i> {{ $b->penerbit->nama_penerbit }}</span>
                                    </h3>
                                </h5>
                                <h5><span class="badge badge-info mr-2"><i class="fa-solid fa-book-bookmark"></i>
                                        {{ $b->peminjamans->count() }}</span></h3>
                                </h5>
                                @if ($b->j_buku_baik + $b->j_buku_rusak > 1)
                                    <h5><span class="badge bg-success text-white">Tersedia</span></h5>
                                @else
                                    <h5><span class="badge bg-danger text-white">Kosong</span></h5>
                                @endif
                            </div>
                            <h4 class="w-50"><a href="{{ url('user/form_peminjaman/' . $b->id) }}"
                                    class="badge badge-warning w-100"><i class="fa-solid fa-book-bookmark"></i> Pinjam</a></h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-center px-4 border bg-danger text-white">
                            <h1>{{ $loop->index + 1 }}</h1>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @foreach ($kategoris as $k)
        @if ($k->bukus->count() > 0)
            <hr>
            <nav class="navbar navbar-light bg-light">
                <h3><b>{{ $k->nama_kategori }}</b></h3>
            </nav>
            <div class="d-flex flex-row mt-2 bukus">
                @foreach ($k->bukus->sortBy('judul_buku') as $buku)
                    @if ($loop->iteration % 4 == 1)
            </div>
            <div class="d-flex flex-row mt-2 bukus">
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
                            <div class="modal-body">
                                <center>
                                    <img src="{{ url('/img' . '/' . $buku->foto) }}" class="rounded border border-4 p-1"
                                        style="height: 450px;object-fit: cover;">
                                    <h3 class="mt-2"><b>{{ $buku->judul_buku }}</b></h3>
                                    <p>By : <a
                                            href="https://www.google.com/search?q={{ str_replace(' ', '_', $buku->pengarang) }}"
                                            target="_blank">{{ $buku->pengarang }}</a>, {{ $buku->tahun_terbit }}</p>
                                    <p>Stok : <span class="text-info">{{ $buku->j_buku_baik }} | <span
                                                class="text-muted">{{ $buku->j_buku_rusak }}</span></span></p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><b>{{ $buku->judul_buku }}</b></h5>
                    @if ($buku->j_buku_baik + $buku->j_buku_rusak > 1)
                        <h5><span class="badge bg-success text-white">Tersedia</span></h5>
                    @else
                        <h5><span class="badge bg-danger text-white">Kosong</span></h5>
                    @endif
                    <p>By : <a href="https://www.google.com/search?q={{ str_replace(' ', '_', $buku->pengarang) }}"
                            target="_blank">{{ $buku->pengarang }}</a></p>
                    <p>Penerbit : {{ $buku->penerbit->nama_penerbit }}</p>
                    @if ($buku->j_buku_baik + $buku->j_buku_rusak > 1)
                        <a href="{{ url('user/form_peminjaman/' . $buku->id) }}" class="btn btn-info"><i class="fa-solid fa-book-bookmark"></i> Pinjam</a>
                    @else
                        <a href="#" class="btn btn-warning text-black"><i class="fa-solid fa-bookmark"></i> Bookmark</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @endif
    @endforeach
@endsection

@extends('layouts.admin')

@section('content')
    <h2><b>Data Buku</b></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Katalog Buku</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
        </ol>
    </nav>
    @if (\Session::has('successAdd'))
        <div class="alert alert-success d-flex align-items-center">
            {{ \Session::get('successAdd') }}
        </div>
    @endif
    <hr>
    <div class="d-flex flex-row">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info my-2" data-toggle="modal" data-target="#tambahBuku">
            Tambah Buku
        </button>
        {{-- Search Bar --}}
        <form action="{{ route('admin.search.buku') }}" class="my-2 ml-4" style="width:70%;" method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control " placeholder="Cari Anggota" name="search"
                    value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="tambahBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.create.buku') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Judul Buku"
                                    name="judul_buku" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Pengarang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Pengarang"
                                    name="pengarang" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kategori</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="exampleFormControlSelect1" name="id_kategori">
                                    <option disabled selected hidden>Pilih Opsi</option>
                                    @foreach ($kategoris as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Penerbit</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="exampleFormControlSelect1" name="id_penerbit">
                                    <option disabled selected hidden>Pilih Opsi</option>
                                    @foreach ($penerbits as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama_penerbit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Buku Baik</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Jumlah Buku Baik"
                                    name="j_buku_baik" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Buku Rusak</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Jumlah Buku Buruk"
                                    name="j_buku_rusak" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Tahun Terbit</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Tahun Terbit"
                                    name="tahun_terbit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Foto</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                    name="foto">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered" style="table-layout: fixed">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center align-middle">No</th>
                <th scope="col" class="text-center align-middle" colspan="2">Judul Buku</th>
                <th scope="col" class="text-center align-middle" colspan="2">Pengarang</th>
                <th scope="col" class="text-center align-middle" colspan="2">Penerbit</th>
                <th scope="col" class="text-center align-middle">Buku Baik</th>
                <th scope="col" class="text-center align-middle">Buku Rusak</th>
                <th scope="col" class="text-center align-middle">Foto</th>
                <th scope="col" class="text-center align-middle" colspan="3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            @foreach ($bukus as $b)
                <tr>
                    <td class="text-center">{{ $bukus->perPage() * ($bukus->currentPage() - 1) + $count }}</td>
                    <?php $count++; ?>
                    <td colspan="2">{{ $b->judul_buku }}</td>
                    <td colspan="2">{{ $b->pengarang }}</td>
                    <td class="text-center" colspan="2">{{ $b->penerbit->nama_penerbit }}</td>

                    @if ($b->j_buku_baik == null)
                        <td class="text-center text-muted"><i>- <i class="fa-solid fa-xmark"></i> -</i></td>
                    @else
                        <td class="text-center">{{ $b->j_buku_baik }}</td>
                    @endif

                    @if ($b->j_buku_rusak == null)
                        <td class="text-center text-muted"><i>- <i class="fa-solid fa-xmark"></i> -</i></td>
                    @else
                        <td class="text-center">{{ $b->j_buku_rusak }}</td>
                    @endif

                    @if ($b->foto == null)
                        <td class="text-center text-muted"><i>- <i class="fa-solid fa-xmark"></i> -</i></td>
                    @else
                        <td class="text-center">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#foto{{ $b->id }}">
                                Lihat
                            </button>

                            <!-- Modal -->
                            <div class="modal fade text-left " id="foto{{ $b->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Foto {{ $b->judul_buku }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <img src="{{ url('/img' . '/' . $b->foto) }}"
                                                    style="height: 450px;object-fit: cover;">
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endif

                    <td class="text-center" colspan="3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#updateBuku{{ $b->id }}">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="updateBuku{{ $b->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Buku
                                            {{ $b->judul_buku }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('admin/update_buku/' . $b->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Judul
                                                    Buku</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Judul Buku" name="judul_buku"
                                                        value="{{ $b->judul_buku }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Pengarang</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Pengarang" name="pengarang"
                                                        value="{{ $b->pengarang }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Kategori</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="id_kategori">
                                                        @foreach ($kategoris as $k)
                                                            @if ($b->id_kategori == $k->id)
                                                                <option value="{{ $k->id }}" selected>
                                                                    {{ $k->nama_kategori }}</option>
                                                            @else
                                                                <option value="{{ $k->id }}">
                                                                    {{ $k->nama_kategori }}
                                                            @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Penerbit</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="exampleFormControlSelect1"
                                                        name="id_penerbit">
                                                        @foreach ($penerbits as $p)
                                                            @if ($b->id_penerbit == $p->id)
                                                                <option value="{{ $p->id }}" selected>
                                                                    {{ $p->nama_penerbit }}
                                                                @else
                                                                <option value="{{ $p->id }}">
                                                                    {{ $p->nama_penerbit }}
                                                            @endif
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Buku
                                                    Baik</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Jumlah Buku Baik" name="j_buku_baik"
                                                        value="{{ $b->j_buku_baik }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Buku
                                                    Rusak</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Jumlah Buku Buruk" name="j_buku_rusak"
                                                        value="{{ $b->j_buku_rusak }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Tahun
                                                    Terbit</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Tahun Terbit" name="tahun_terbit"
                                                        value="{{ $b->tahun_terbit }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Foto</label>
                                                <div class="col-sm-8">
                                                    <input type="file" class="form-control-file"
                                                        id="exampleFormControlFile1" name="foto">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary my-2">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#deleteBuku{{ $b->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left " id="deleteBuku{{ $b->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Buku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center text-danger">
                                        <h1><i class="fa-solid fa-trash"></i></h1>
                                        <h4>Apakah anda yakin ingin menghapus buku <b>{{ $b->judul_buku }}</b>?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('admin/delete_buku/' . $b->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-center mt-2">
        {{ $bukus->links('pagination::bootstrap-4') }}
    </div>
@endsection

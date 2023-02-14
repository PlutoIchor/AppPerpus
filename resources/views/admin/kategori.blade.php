@extends('layouts.admin')

@section('content')
    <h2><b>Data Kategori</b></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Katalog Buku</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
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
            Tambah Kategori
        </button>
        <form action="{{ route('admin.search.kategori') }}" class="my-2 ml-4" style="width:70%;" method="POST">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.create.kategori') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kode Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Kode Kategori"
                                    name="kode_kategori" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Kategori</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Nama Kategori"
                                    name="nama_kategori" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered" style="table-layout: fixed;">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Kode Kategori</th>
                <th scope="col" class="text-center" colspan="2">Nama Kategori</th>
                <th scope="col" class="text-center">Jumlah buku</th>
                <th scope="col" class="text-center" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 1; ?>
            @foreach ($kategoris as $k)
                <tr>
                    <td class="text-center">{{ $kategoris->perPage() * ($kategoris->currentPage() - 1) + $count }}</td>
                    <?php $count++; ?>
                    <td>{{ $k->kode_kategori }}</td>
                    <td colspan="2">{{ $k->nama_kategori }}</td>
                    <td class="text-center">{{ $k->bukus->count() }}</td>

                    <td class="text-center" colspan="2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#updateKategori{{ $k->id }}">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="updateKategori{{ $k->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Kategori
                                            {{ $k->nama_kategori }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('admin/update_kategori/' . $k->id) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Kode
                                                    Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Kode Kategori" name="kode_kategori"
                                                        value="{{ $k->kode_kategori }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama
                                                    Kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Nama Kategori" name="nama_kategori"
                                                        value="{{ $k->nama_kategori }}" required>
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
                            data-target="#deleteKategori{{ $k->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left " id="deleteKategori{{ $k->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center text-danger">
                                        <h1><i class="fa-solid fa-trash"></i></h1>
                                        <h4>Apakah anda yakin ingin menghapus <br>kategori <b>{{ $k->nama_kategori }}</b>?
                                        </h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('admin/delete_kategori/' . $k->id) }}">
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
        {{ $kategoris->links('pagination::bootstrap-4') }}
    </div>
@endsection

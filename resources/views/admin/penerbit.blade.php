@extends('layouts.admin')

@section('content')
    <h2><b>Data Penerbit</b></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penerbit</li>
        </ol>
    </nav>
    @if (\Session::has('successAdd'))
        <div class="alert alert-success d-flex align-items-center">
            {{ \Session::get('successAdd') }}
        </div>
    @endif
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info my-2" data-toggle="modal" data-target="#tambahAnggota">
        Tambah Penerbit
    </button>
    

    <!-- Modal -->
    <div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">TAMBAH PENERBIT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.create.penerbit') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kode Penerbit</label>
                            <div class="col-sm-8">
                                <input type="text"class="form-control" id="staticEmail" name="kode_penerbit" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Penerbit</label>
                            <div class="col-sm-8">
                                <input type="text"class="form-control" id="staticEmail" name="nama_penerbit" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Kode Penerbit</th>
                <th scope="col" class="text-center">Nama Penerbit</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerbits as $p)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $p->kode_penerbit }}</td>
                    <td class="text-center">{{ $p->nama_penerbit }}</td>
                    <td class="text-center text-success">{{ $p->verif_penerbit }} <i class="fa-solid fa-square-check"></i>
                    </td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#updatePenerbit{{ $p->id }}">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="updatePenerbit{{ $p->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Penerbit {{ $p->nama_penerbit }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('admin/update_penerbit/' . $p->id) }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Kode
                                                    Penerbit</label>
                                                <div class="col-sm-8">
                                                    <input type="text"class="form-control" id="staticEmail"
                                                        name="kode_penerbit" value="{{ $p->kode_penerbit }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama
                                                    Penerbit</label>
                                                <div class="col-sm-8">
                                                    <input type="text"class="form-control" id="staticEmail"
                                                        name="nama_penerbit" value="{{ $p->nama_penerbit }}" required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary my-3">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#deletePenerbit{{ $p->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left " id="deletePenerbit{{ $p->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Penerbit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center text-danger">
                                        <h1><i class="fa-solid fa-trash"></i></h1>
                                        <h4>Apakah anda yakin ingin menghapus <b>{{ $p->nama_penerbit }}</b>?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('admin/delete_penerbit/' . $p->id) }}">
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
@endsection

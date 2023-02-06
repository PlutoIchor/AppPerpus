@extends('layouts.admin')

@section('content')
    <h2><b>Data Anggota</b></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
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
        Tambah Anggota
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Anggota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.create.anggota') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kode User</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Kode User"
                                    name="kode_user" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="NIS" name="nis"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Username"
                                    name="username" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Nama Lengkap"
                                    name="fullname" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Kelas"
                                    name="kelas" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="staticEmail" placeholder="Password"
                                    name="password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Kode User</th>
                <th scope="col" class="text-center">NIS</th>
                <th scope="col" class="text-center">Nama Lengkap</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Kelas</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggotas as $a)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $a->kode_user }}</td>
                    <td class="text-center">{{ $a->nis }}</td>
                    <td>{{ $a->fullname }}</td>
                    <td>{{ $a->username }}</td>
                    <td class="text-center">{{ $a->kelas }}</td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#updateAnggota{{ $a->id }}">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="updateAnggota{{ $a->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Anggota {{ $a->username }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('admin/update_anggota/' . $a->id) }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Kode User</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Kode User" name="kode_user"
                                                        value="{{ $a->kode_user }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">NIS</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="NIS" name="nis" value="{{ $a->nis }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Username" name="username"
                                                        value="{{ $a->username }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Nama
                                                    Lengkap</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Nama Lengkap" name="fullname"
                                                        value="{{ $a->fullname }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Kelas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Kelas" name="kelas" value="{{ $a->kelas }}"
                                                        required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#deleteAnggota{{ $a->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left " id="deleteAnggota{{ $a->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Anggota</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center text-danger">
                                        <h1><i class="fa-solid fa-trash"></i></h1>
                                        <h4>Apakah anda yakin ingin menghapus <b>{{ $a->fullname }}</b>?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('admin/delete_anggota/' . $a->id) }}">
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

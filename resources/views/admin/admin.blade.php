@extends('layouts.admin')

@section('content')
    <h2><b>Data Admin</b></h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Admin</li>
        </ol>
    </nav>
    @if (\Session::has('successAdd'))
        <div class="alert alert-success d-flex align-items-center">
            {{ \Session::get('successAdd') }}
        </div>
    @endif
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-info my-2" data-toggle="modal" data-target="#tambahAdmin">
        Tambah Admin
    </button>

    <!-- Modal -->
    <div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.create.admin') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Kode Admin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Kode Admin"
                                    name="kode_user" required>
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
                            <label for="staticEmail" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="staticEmail" placeholder="Username"
                                    name="username" required>
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
                <th scope="col" class="text-center">Kode Admin</th>
                <th scope="col" class="text-center">Nama Lengkap</th>
                <th scope="col" class="text-center">Username</th>
                <th scope="col" class="text-center">Terakhir Login</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $a)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="text-center">{{ $a->kode_user }}</td>
                    <td>{{ $a->fullname }}</td>
                    @if ($a->id == Auth::user()->id)
                        <td>{{ $a->username }} <i class="text-muted">(Anda)</i></td>
                    @else
                        <td>{{ $a->username }}</td>
                    @endif
                    @if (isset($a->terakhir_login))
                        <td class="text-center">{{ $a->terakhir_login }}</td>
                    @else
                        <td class="text-center text-muted">-- Tidak Diketahui --</td>
                    @endif
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#updateAdmin{{ $a->id }}">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left" id="updateAdmin{{ $a->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Admin
                                            {{ $a->username }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('admin/update_admin/' . $a->id) }}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Kode
                                                    Admin</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Kode Admin" name="kode_user"
                                                        value="{{ $a->kode_user }}" required>
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
                                                <label for="staticEmail" class="col-sm-4 col-form-label">Username</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="staticEmail"
                                                        placeholder="Username" name="username"
                                                        value="{{ $a->username }}" required>
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
                            data-target="#deleteAdmin{{ $a->id }}">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-left " id="deleteAdmin{{ $a->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Admin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center text-danger">
                                        <h1><i class="fa-solid fa-trash"></i></h1>
                                        <h4>Apakah anda yakin ingin menghapus<br>admin <b>{{ $a->username }}</b>?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ url('admin/delete_admin/' . $a->id) }}">
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

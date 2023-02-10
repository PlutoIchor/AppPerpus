@extends('layouts.admin')

@section('content')
    <div>
        <center>
            <h3><b>Identitas Aplikasi</b></h3>
        </center>
    </div>
    <hr>
    <div class="mb-3">
        <center>
            <img src="/img/{{ $identitas->foto }}"
                class="rounded-circle border border-secondary" style="width: 250px;" alt="Avatar" />

        </center>
    </div>
    @if (\Session::has('successAdd'))
        <div class="alert alert-success d-flex align-items-center">
            {{ \Session::get('successAdd') }}
        </div>
    @endif
    <form class="m-auto w-100 p-3 border rounded" method="POST" action="{{ route('admin.update.identitas') }}"enctype="multipart/form-data">
        @csrf
        <h4 class="mb-2">Edit Identitas Aplikasi</h4>
        <hr>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-9">
                <input type="file" class="form-control" name="foto">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Aplikasi</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{ $identitas->nama_app }}" name="nama_app" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" value="{{ $identitas->email_app }}" name="email_app" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nomor Telepon</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{ $identitas->nomor_hp }}" name="nomor_hp" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $identitas->alamat }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary mt-2 w-100">Simpan</button>
    </form>
@endsection

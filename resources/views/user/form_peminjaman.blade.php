@extends('layouts.user')

@section('content')
    <form class="m-auto w-100 p-3 border rounded">
        <h3><b>Form Peminjaman Buku</b></h3>
        <hr>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Anggota</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="Christian Dimas" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_peminjaman">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Buku</label>
            <div class="col-sm-9">
                <select class="form-control" id="exampleFormControlSelect1" name="buku">
                    <option value="" disabled selected hidden>Pilih Opsi</option>
                    @foreach ($bukus as $buku)
                        <option value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                    @endforeach
                  </select>
            </div>
          </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kondisi Buku Saat Dipinjam</label>
            <div class="col-sm-9">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option value="" disabled selected hidden>Pilih Opsi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                  </select>
            </div>
          </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
@endsection

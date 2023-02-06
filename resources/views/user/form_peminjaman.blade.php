@extends('layouts.user')

@section('content')
    <form class="m-auto w-100 p-3 border rounded" method="POST" action="{{ route('user.create.peminjaman') }}">
        @csrf
        <h3><b>Form Peminjaman Buku</b></h3>
        <hr>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Anggota</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{ Auth::user()->fullname }}" disabled>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="tanggal_peminjaman" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Buku</label>
            <div class="col-sm-9">
                <select class="form-control" id="exampleFormControlSelect1" name="id_buku" required>
                    <option value="" disabled selected hidden>Pilih Opsi</option>
                    @foreach ($bukus as $buku)
                        @if (isset($id_buku) && $buku->id == $id_buku)
                            <option value="{{ $buku->id }}" selected>{{ $buku->judul_buku }}</option>
                        @else
                            <option value="{{ $buku->id }}">{{ $buku->judul_buku }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kondisi Buku Saat Dipinjam</label>
            <div class="col-sm-9">
                <select class="form-control" id="exampleFormControlSelect1" name="kondisi_buku_saat_dipinjam" required>
                    <option value="" disabled selected hidden>Pilih Opsi</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-secondary mt-2 w-100">PINJAM</button>
    </form>
@endsection

@extends('layouts.admin')

@section('content')
    <h2><b>Laporan Perpustakaan</b></h2>
    <hr>
    <div class="accordion align-items-center" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h4 class="text-dark"><i class="fa-solid fa-bookmark"></i> Peminjaman Buku</h4>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="px-4" action="{{ route('admin.laporan.peminjaman') }}" method="POST">
                        @csrf
                        <div class="input-group row">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Dari / Sampai</span>
                            </div>
                            <input type="date" class="form-control" name="tanggal_awal" required>
                            <input type="date" class="form-control" name="tanggal_akhir" required>
                        </div>
                        <div class="row mt-3">
                            <button type="submit" class="btn btn-danger mr-2" name="action" value="pdf">Cetak PDF <i
                                    class="fa-solid fa-file-pdf"></i></button>
                            <button type="submit" class="btn btn-success" name="action" value="excel">Ekspor Excel <i
                                    class="fa-solid fa-file-excel"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h4 class="text-dark"><i class="fa-solid fa-hand-holding-hand"></i> Pengembalian Buku</h4>
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="px-4" action="{{ route('admin.laporan.pengembalian') }}" method="POST">
                        @csrf
                        <div class="input-group row">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">Dari / Sampai</span>
                            </div>
                            <input type="date" class="form-control" name="tanggal_awal" required>
                            <input type="date" class="form-control" name="tanggal_akhir" required>
                        </div>
                        <div class="row mt-3">
                            <button type="submit" class="btn btn-danger mr-2" name="action" value="pdf">Cetak PDF <i
                                    class="fa-solid fa-file-pdf"></i></button>
                            <button type="submit" class="btn btn-success" name="action" value="excel">Ekspor Excel <i
                                    class="fa-solid fa-file-excel"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <h4 class="text-dark"><i class="fa-solid fa-users"></i> Anggota Perpustakaan</h4>
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                    <form class="px-4" action="{{ route('admin.laporan.anggota') }}" method="POST">
                        @csrf
                        <div class="input-group row">
                            <span class="input-group-text">Cari Berdasarkan</span>
                            <select class="form-select" aria-label="Default select example" name="kolom" required>
                                <option disabled selected hidden>Pilih Opsi</option>
                                <option value="kode_user">Kode User</option>
                                <option value="nis">NIS</option>
                                <option value="fullname">Nama Lengkap</option>
                                <option value="username">Username</option>
                                <option value="kelas">Kelas</option>
                                <option value="alamat">Alamat</option>
                              </select>
                            <input type="text" class="form-control" placeholder="Data" name="data" aria-label="Server" required>
                          </div>
                        <div class="row mt-3">
                            <button type="submit" class="btn btn-danger mr-2" name="action" value="pdf">Cetak PDF
                                <i class="fa-solid fa-file-pdf"></i></button>
                            <button type="submit" class="btn btn-success" name="action" value="excel">Ekspor Excel <i
                                    class="fa-solid fa-file-excel"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

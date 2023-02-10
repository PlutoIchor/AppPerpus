@extends('layouts.user')

@section('content')
    <h2><b>Pesan Terkirim</b></h2>
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kirimPesan">
        Kirim Pesan
    </button>

    @if (\Session::has('successAdd'))
        <div class="alert alert-success d-flex align-items-center mt-3">
            {{ \Session::get('successAdd') }}
        </div>
    @endif
    @if (\Session::has('fail'))
        <div class="alert alert-danger d-flex align-items-center mt-3">
            {{ \Session::get('fail') }}
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="kirimPesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Kirim Pesan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('create.pesan') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Kepada</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Username"
                                    name="username" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Judul</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Judul Pesan"
                                    required name="judul_pesan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Isi Pesan</label>
                            <textarea class="form-control" aria-label="With textarea" name="isi_pesan" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-3">
        @foreach ($messages as $message)
            <div class="card mb-2">
                @if ($message->status == 'terkirim')
                    <div class="card-header bg-info text-white">
                        <i class="fa-solid fa-share-from-square"></i> Kepada <b>{{ $message->penerima->username }}</b>,
                        {{ $message->tanggal_kirim }}
                    </div>
                @else
                    <div class="card-header bg-secondary text-white">
                        <i class="fa-regular fa-envelope-open"></i> Kepada <b>{{ $message->penerima->username }}</b>,
                        {{ $message->tanggal_kirim }}
                    </div>
                @endif

                <div class="card-body">
                    <h5 class="card-title"><b><a
                                href="{{ url('pesan/' . $message->id) }}">{{ $message->judul_pesan }}</a></b></h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($message->isi_pesan, 15, $end = '...') }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="pagination justify-content-center mt-2">
        {{ $messages->links('pagination::bootstrap-4') }}
    </div>
@endsection

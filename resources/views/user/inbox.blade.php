@extends('layouts.user')

@section('content')
    <h2><b>Inbox</b></h2>
    <hr>
    <div class="mt-4">
        @foreach ($inbox as $pesan)
            <div class="card mb-2">
                @if ($pesan->status == 'terkirim')
                    <div class="card-header bg-primary text-white">
                        <i class="fa-regular fa-paper-plane"></i> Dari <b>{{ $pesan->pengirim->username }}</b>,
                        {{ $pesan->tanggal_kirim }}
                    </div>
                @else
                    <div class="card-header bg-secondary text-white">
                        <i class="fa-solid fa-check-double"></i> Dari <b>{{ $pesan->pengirim->username }}</b>,
                        {{ $pesan->tanggal_kirim }}
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title"><b><a href="{{ url('user/pesan/' . $pesan->id) }}">{{ $pesan->judul_pesan }}</a></b></h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($pesan->isi_pesan, 15, $end = '...') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('layouts.user')

@section('content')
    <h2><b>Pesan Terkirim</b></h2>
    <hr>
    <div class="mt-4">
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
                    <h5 class="card-title"><b><a href="">{{ $message->judul_pesan }}</a></b></h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($message->isi_pesan, 15, $end = '...') }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode_user' => 'U01',
            'nis' => '12067',
            'fullname' => 'Christian Dimas',
            'username' => 'Dimas', 
            'password' => Hash::make('password'),
            'kelas' => '12 RPL',
            'verif' => 'verified',
            'role' =>  'user',
            'join_date' => now(),
        ]);

        User::create([
            'kode_user' => 'A01',
            'nis' => '12068',
            'fullname' => 'Dimas',
            'username' => 'Pluto', 
            'password' => Hash::make('password'),
            'kelas' => '12 RPL',
            'verif' => 'verified',
            'role' =>  'admin',
            'join_date' => now(),
        ]);

        Penerbit::create([
            'kode_penerbit' => 'P01',
            'nama_penerbit'=> 'Mangareader',
            'verif_penerbit' => 'verified'
        ]);

        Penerbit::create([
            'kode_penerbit' => 'P02',
            'nama_penerbit'=> 'Gramedia',
            'verif_penerbit' => 'verified'
        ]);

        Kategori::create([
            'kode_kategori' => 'K01',
            'nama_kategori'=> 'Historical'
        ]);

        Kategori::create([
            'kode_kategori' => 'K02',
            'nama_kategori'=> 'Science'
        ]);

        Kategori::create([
            'kode_kategori' => 'K03',
            'nama_kategori'=> 'Action'
        ]);

        Kategori::create([
            'kode_kategori' => 'K04',
            'nama_kategori'=> 'Drama'
        ]);

        Buku::create([
            'judul_buku' => 'Vagabond',
            'id_kategori' => 1,
            'id_penerbit' => 1,
            'pengarang' => 'Takehiko Inoue',
            'tahun_terbit' => 1998,
            'j_buku_baik' => 30,
            'j_buku_rusak' => 1,
            'foto' => 'vagabond.jpg'
        ]);

        Buku::create([
            'judul_buku' => 'Real',
            'id_kategori' => 1,
            'id_penerbit' => 1,
            'pengarang' => 'Takehiko Inoue',
            'tahun_terbit' => 1999,
            'j_buku_baik' => 5,
            'j_buku_rusak' => 1,
            'foto' => 'real.jpg'
        ]);

        Buku::create([
            'judul_buku' => 'Oyasumi Punpun',
            'id_kategori' => 4,
            'id_penerbit' => 1,
            'pengarang' => 'Inio Asano',
            'tahun_terbit' => 2007,
            'j_buku_baik' => 24,
            'j_buku_rusak' => 1,
            'foto' => 'punpun.jpg'
        ]);
        Buku::create([
            'judul_buku' => 'Berserk',
            'id_kategori' => 3,
            'id_penerbit' => 1,
            'pengarang' => 'Kentaro Miura',
            'tahun_terbit' => 1989,
            'j_buku_baik' => 100,
            'j_buku_rusak' => 0,
            'foto' => 'berserk.jpg'
        ]);
        
        Peminjaman::create([
            'id_anggota' => 1,
            'id_buku' => 1,
            'tanggal_peminjaman' => now(),
            'kondisi_buku_saat_dipinjam' => 'Baik'
        ]);

        Peminjaman::create([
            'id_anggota' => 1,
            'id_buku' => 2,
            'tanggal_peminjaman' => '2023/01/19',
            'kondisi_buku_saat_dipinjam' => 'Baik'
        ]);

        Identitas::create([
            'nama_app' => 'Perpus SMKN 10 Jakarta',
            'email_app' => 'perpus10@gmail.com',
            'nomor_hp' => '081563832997',
            'alamat' => 'Cawang, Jakarta Timur'
        ]);

        Pemberitahuan::create([
            'isi_pemberitahuan' => 'Perpus sedang direnovasi',
            'level_user' => 'user',
            'status' => 'aktif'
        ]);

        Pesan::create([
            'id_penerima' => 2,
            'id_pengirim'=> 1,
            'judul_pesan' => 'Rekomendasi buku baru',
            'isi_pesan' => 'Bacalah buku terbaru perpus, Vagabond',
            'status' => 'terkirim',
            'tanggal_kirim' => now(),
        ]);
    }
}

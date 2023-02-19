<h1 align="center">E-Perpus Requirements 🗿🍷</h1>

## Install Laravel 8

<p>composer create-project laravel/laravel:^8.* LSPerpus</p>

## Install Bootstap Auth

<p>composer require laravel/ui:^3.4.6</p>
<p>php artisan ui bootstrap --auth</p>

## Create Model & Migration

<p>php artisan make:model Kategori -m</p>
<p>php artisan make:model Penerbit -m</p>
<p>php artisan make:model Buku -m</p>
<p>php artisan make:model Peminjaman -m</p>
<p>php artisan make:model Pesan -m</p>
<p>php artisan make:model Pemberitahuan -m</p>
<p>php artisan make:model Identitas -m</p>

## Create Role Middleware

<p>php artisan make:middleware Role</p>

## Create Seeder

<p>php artisan make:seeder DataSeeder</P>

## Create Register Controller

<p>php artisan make:controller RegisterController</p>

## Create Global Controller

<p>php artisan make:controller CreateController</p>
<p>php artisan make:controller ReadController</p>
<p>php artisan make:controller UpdateController</p>
<p>php artisan make:controller DeleteController</p>
<p>php artisan make:controller SearchController</p>

## Create Layouts 

<p>layouts.user</p>
<p>layouts.admin</p>

## Create User View

<p>user.dashboard</p>
<br>
<p>user.peminjaman.form</p>
<p>user.peminjaman.riwayat</p>
<br>
<p>user.pengembalian.form</p>
<p>user.pengembalian.riwayat</p>
<br>
<p>user.pesan.masuk</p>
<p>user.pesan.terkirim</p>
<br>
<p>user.profile</p>

## Create Admin View

<p>admin.dashboard</p>
<br>
<p>admin.masterdata.administrator</p>
<p>admin.masterdata.anggota</p>
<p>admin.masterdata.peminjaman</p>
<p>admin.masterdata.penerbit</p>
<br>
<p>admin.katalog.buku</p>
<p>admin.katalog.kategori</p>
<br>
<p>admin.laporan.laporan</p>
<p>admin.laporan.laporan_peminjaman_pdf</p>
<p>admin.laporan.laporan_pengembalian_pdf</p>
<p>admin.laporan.laporan_siswa_pdf</p>
<br>
<p>admin.excel.peminjaman</p>
<p>admin.excel.pengembalian</p>
<p>admin.excel.user</p>
<br>
<p>admin.pesan.masuk</p>
<p>admin.pesan.terkirim</p>
<br>
<p>admin.identitas</p>

## PDF Installation

<p>composer require barryvdh/laravel-dompdf</p>
<br>
<p>Barryvdh\DomPDF\ServiceProvider::class, => add code to config/app.php inside 'providers'</p>
<p>'PDF' => Barryvdh\DomPDF\Facade::class, => add code to config/app.php inside 'aliases'</p>

## Excel Instalation

<p>composer require maatwebsite/excel</p>
<br>
<p>Maatwebsite\Excel\ExcelServiceProvider::class, => add code to config/app.php inside 'providers'</p>
<p>'Excel' => Maatwebsite\Excel\Facades\Excel::class, => add code to config/app.php inside 'aliases'</p>
<br>
<p>php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"</p>
<br>
<p>php artisan make:export LaporanExport</p>
<p>php artisan make:export PengembalianExport</p>
<p>php artisan make:export UserExport</p>

## Create API

<p>php artisan make:controller API/APIBukuController</p>
<p>php artisan make:controller API/APIIdentitasController</p>
<p>php artisan make:controller API/APIKategoriController</p>
<p>php artisan make:controller API/APIPemberitahuanController</p>
<p>php artisan make:controller API/APIPeminjamanController</p>
<p>php artisan make:controller API/APIPenerbitController</p>
<p>php artisan make:controller API/APIPesanController</p>
<p>php artisan make:controller API/APIUserController</p>

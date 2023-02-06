<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;
    protected $fillable= [
        'nama_app',
        'alamat_app',
        'email_app',
        'nomor_hp'
    ];

    public function penerima()
    {
        return $this->belongsTo(User::class, 'id_penerima');
    }
    public function pengirim()
    {
        return $this->belongsTo(User::class, 'id_pengirim');
    }
}

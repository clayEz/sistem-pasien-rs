<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien'; // Nama tabel

    protected $primaryKey = 'no_rm'; // Primary key

    public $incrementing = false; // Karena no_rm tipe varchar, bukan auto increment

    protected $keyType = 'string'; // Tipe primary key-nya string

    protected $fillable = [
        'no_rm',
        'nama_pasien',
        'alamat',
        'no_telp',
        'gender',
        'tempat_lahir',
        'tgl_lahir',
        'contact_person',
        'status_cp'
    ];

    public $timestamps = false; // Karena di tabel tidak ada created_at dan updated_at
}
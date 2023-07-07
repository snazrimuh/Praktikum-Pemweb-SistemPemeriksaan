<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibu extends Model
{
    use HasFactory;

    protected $table = 'ibu';
    protected $primaryKey = 'nik_ibu';
    protected $fillable = ['nik_ibu', 'nama_ibu', 'alamat_ibu', 'tgl_lahir_ibu','foto_profil',];

    public function getFotoProfilUrlAttribute()
    {
        if ($this->foto_profil) {
            return asset('storage/foto_profil/' . $this->foto_profil);
        }
        return asset('img/default-profile.jpg');
    }
}

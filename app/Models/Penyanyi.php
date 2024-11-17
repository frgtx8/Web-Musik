<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Music;

class Penyanyi extends Model
{
    protected $table = 'penyanyi';
    protected $fillable = [
        'nama_penyanyi',
        'gambar'
    ];

    public function relasi()
    {
        return $this->hasMany(Music::class,'id_penyanyi');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Penyanyi;

class Music extends Model
{protected $table = 'music';

    protected $fillable = [
        'judul_lagu',
        'id_penyanyi'
    ]
;
public function penyanyi()
{
    return $this->belongsTo(Penyanyi::class, 'id_penyayi');
}
}

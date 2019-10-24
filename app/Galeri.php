<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeri extends Model
{
    use SoftDeletes;

    protected $guarded = array();
    protected $table='galeri';

    protected $fillabel=[
        'judul', 'keterangan', 'path', 'users_id', 'kategori_galeri_id'
    ];

    protected $casts=[
        'deleted_at'=>'datetime'

    ];
}

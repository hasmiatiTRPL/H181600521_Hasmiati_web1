<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use SoftDeletes;

    protected $guarded = array();
    protected $table='berita';

    protected $fillabel=[
        'judul', 'isi', 'users_id','kategori_berita_id'
    ];

    protected $casts=[
        'deleted_at'=>'datetime'

    ];
}

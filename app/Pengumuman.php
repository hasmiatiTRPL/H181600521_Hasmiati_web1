<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use SoftDeletes;

    protected $guarded = array();
    protected $table='pengumuman';

    protected $fillabel=[
        'judul', 'isi', 'users_id', 'kategori_pengumuman_id'
    ];

    protected $casts=[
        'deleted_at'=>'datetime'

    ];
}

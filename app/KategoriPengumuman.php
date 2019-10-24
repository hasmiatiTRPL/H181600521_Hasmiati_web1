<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriPengumuman extends Model
{
    use SoftDeletes;

    protected $guarded = array();
    protected $table='kategori_pengumuman';

    protected $fillabel=[
        'nama', 'users_id'
    ];
    protected $casts=[
        'deleted_at'=>'datetime'

    ];
}

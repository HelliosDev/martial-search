<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dojo extends Model
{
    protected $primaryKey = 'id_tempat';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_tempat', 'location', 'foto_tempat',
    ];

    public function ownership() {
        return $this->hasMany('App\Ownership', 'id_tempat');
    }
}

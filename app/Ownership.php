<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ownership extends Model
{
    protected $primaryKey = 'id_kepemilikan';
    public $timestamps = false;

    public function dojo() {
        return $this->belongsTo('App\Dojo');
    }
}

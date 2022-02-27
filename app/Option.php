<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;
    public $fillable = ["option","enquete_id"];
    public function enquete() {
        return $this->belongsTo(Enquete::class);
    }
}
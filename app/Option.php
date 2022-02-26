<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    public function enquete() {
        return $this->belongsTo(Enquete::class);
    }
}

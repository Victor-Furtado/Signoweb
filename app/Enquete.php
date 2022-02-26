<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquete extends Model
{
    public $timestamps = false;
    public $fillable = ["title","question","dt_start","dt_end"];
    public function options() {
        return $this->hasMany(Option::class);
    }
}
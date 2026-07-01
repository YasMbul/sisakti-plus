<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    public function skps()
    {
        return $this->hasMany(Skp::class);
    }
}

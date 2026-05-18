<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkpDetail extends Model
{
    public function unsur()
    {
        return $this->belongsTo(Unsur::class);
    }

    public function skps()
    {
        return $this->hasMany(Skp::class);
    }
}

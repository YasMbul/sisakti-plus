<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
class Semester extends Model
{
    public function skps()
    {
        return $this->hasMany(Skp::class);
    }
}

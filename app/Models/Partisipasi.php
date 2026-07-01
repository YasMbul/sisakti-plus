<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Partisipasi extends Model
{
   public function skpDetails()
   {
      return $this->hasMany(SkpDetail::class);
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partisipasi extends Model
{
   public function skpDetails()
   {
      return $this->hasMany(SkpDetail::class);
   }
}

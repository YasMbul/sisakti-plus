<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
   public function skpDetails()
   {
      return $this->hasMany(SkpDetail::class);
   }
}

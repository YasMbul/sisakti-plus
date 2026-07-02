<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
class Tingkat extends Model
{
   public function skpDetails()
   {
      return $this->hasMany(SkpDetail::class);
   }
}

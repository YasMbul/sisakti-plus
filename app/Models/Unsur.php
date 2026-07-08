<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name'])]
class Unsur extends Model
{
   public function subUnsurs()
   {
      return $this->hasMany(SubUnsur::class);
   }

   public function skpDetails()
   {
      return $this->hasMany(SkpDetail::class);
   }
}

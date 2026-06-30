<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubUnsur extends Model
{
   public function skpDetails()
   {
      return $this->hasMany(SkpDetail::class);
   }

   public function unsur()
   {
      return $this->belongsTo(Unsur::class);
   }
}

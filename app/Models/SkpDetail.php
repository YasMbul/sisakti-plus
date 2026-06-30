<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkpDetail extends Model
{
   public function skps()
   {
      return $this->hasMany(Skp::class);
   }

   public function subUnsur()
   {
      return $this->belongsTo(SubUnsur::class);
   }

   public function tingkat()
   {
      return $this->belongsTo(Tingkat::class);
   }

   public function partisipasi()
   {
      return $this->belongsTo(Partisipasi::class);
   }
}

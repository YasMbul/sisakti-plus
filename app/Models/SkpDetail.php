<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'bobot', 'unsur_id', 'sub_unsur_id', 'tingkat_id', 'partisipasi_id'])]
class SkpDetail extends Model
{
   public function skps()
   {
      return $this->hasMany(Skp::class);
   }

   public function unsur()
   {
      return $this->belongsTo(Unsur::class);
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

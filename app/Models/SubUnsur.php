<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'unsur_id'])]
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

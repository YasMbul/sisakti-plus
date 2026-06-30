<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unsur extends Model
{
   public function subUnsurs()
   {
      return $this->hasMany(SubUnsur::class);
   }
}

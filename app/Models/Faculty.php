<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Faculty extends Model
{
   public function majors()
   {
      return $this->hasMany(Major::class);
   }

   public function users()
   {
      return $this->hasMany(User::class);
   }
}

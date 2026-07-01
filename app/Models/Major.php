<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'faculty_id'])]
class Major extends Model
{
   public function faculty()
   {
      return $this->belongsTo(Faculty::class);
   }

   public function users()
   {
      return $this->hasMany(User::class);
   }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[
   Fillable([
      'name',
      'location',
      'start_date',
      'end_date',
      'semester_id',
      'certificate',
      'status',
      'user_id',
      'semester_id',
      'skp_detail_id',
   ]),
]
class Skp extends Model
{
   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function semester()
   {
      return $this->belongsTo(Semester::class);
   }

   public function skpDetail()
   {
      return $this->belongsTo(SkpDetail::class);
   }

   public function comments()
   {
      return $this->hasMany(Comment::class)->whereNull('parent_id')->with('replies.user');
   }

   protected $casts = [
      'start_date' => 'date',
      'end_date' => 'date',
   ];
}

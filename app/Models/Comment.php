<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['skp_id', 'user_id', 'body', 'parent_id'])]
class Comment extends Model
{
   public function skp()
   {
      return $this->belongsTo(Skp::class);
   }

   public function user()
   {
      return $this->belongsTo(User::class);
   }

   public function replies()
   {
      return $this->hasMany(Comment::class, 'parent_id');
   }

   public function parent()
   {
      return $this->belongsTo(Comment::class, 'parent_id');
   }

   public function isReply(): bool
   {
      return $this->parent_id !== null;
   }
}

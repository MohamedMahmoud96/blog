<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
   public function post()
   {
   	 return $this->belongsToMany('App\Post', 'tag_posts',  'post_id', 'tag_id')->withTimestamps();
   }
}

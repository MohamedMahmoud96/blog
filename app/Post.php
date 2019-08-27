<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'body', 'id',
    ];

    public function admin()
    {

    	return $this->belongsTo('App\Admin', 'post_by');
    }

    public function category()
    {
    	return $this->belongsTO('App\Category', 'category_id');
    }

     public function tag()
    {
        return $this->belongsToMany('App\Tag','tag_posts')->withTimestamps();
    }
}

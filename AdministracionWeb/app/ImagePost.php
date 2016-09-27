<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    protected $fillable = [
    	'post_id',
    	'photo'
    ];

	public function post()
	{
		return $this->belongTo('App\Post');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
    	'title'
    ];

    public function paragraphs()
    {
    	return $this->hasMany('App\Paragraph');
    }
}

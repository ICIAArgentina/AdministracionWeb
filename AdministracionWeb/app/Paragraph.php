<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    protected $fillable = [
    	'section_id',
    	'order',
    	'content'
    ];

    public function section()
    {
    	return $this->belongsTo('App/Section');
    }
}

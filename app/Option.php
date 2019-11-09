<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['description', 'votes', 'pool_id'];

	public function pool() {
		return $this->belongsTo('App\Pool');
	}
}

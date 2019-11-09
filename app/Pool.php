<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    protected $fillable = ['description', 'views'];

	public function options() {
		return $this->hasMany('App\Option');
	}
}

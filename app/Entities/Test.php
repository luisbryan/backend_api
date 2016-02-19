<?php

namespace Testu\Entities;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	public function questions()
	{
		return $this->hasMany('Testu\Entities\TestQuestion');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{	
	protected $table = 'profiles';
	public $primaryKey = 'user_id';
	public $timeStamps = true;	

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}

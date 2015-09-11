<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model {

	protected $fillable = ['name', 'phone'];

    public function vehicles()
    {
        return $this->hasMany('App\Vehicle');
    }

}

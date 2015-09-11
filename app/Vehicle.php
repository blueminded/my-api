<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {

	protected $fillable = ['color', 'power','capacity', 'speed', 'maker_id'];

    public function maker()
    {
        return $this->belongsTo('App\Maker');
    }

}

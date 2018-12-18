<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';
    protected $fillable = [
    	'name',
    	'email',
    	'postal_code',
    ];
    protected $with = [
        'phone',
    ];

    public function phone()
    {
    	return $this->hasOne('App\LeadPhone');
    }
}

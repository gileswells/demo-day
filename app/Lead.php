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

    public function phone()
    {
    	return $this->hasOne('App\LeadPhone');
    }
}
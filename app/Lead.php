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

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($lead) {
            // Handle foreign key deletion first
            $lead->phone()->delete();
        });
    }

    public function phone()
    {
    	return $this->hasOne('App\LeadPhone');
    }
}

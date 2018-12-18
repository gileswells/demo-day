<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadPhone extends Model
{
    protected $fillable = [
    	'lead_id',
    	'phone',
    ];
}

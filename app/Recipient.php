<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    
    protected $fillable = [
        'firstname', 'middlename', 'lastname', 'phone'
    ];
}

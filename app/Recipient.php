<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = [
        'district_id', 'firstname', 'middlename', 'lastname', 'phone'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name'
    ];

    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }

    public function textmessages()
    {
        return $this->hasMany(TextMessage::class);
    }
}

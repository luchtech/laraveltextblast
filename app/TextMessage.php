<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextMessage extends Model
{
    protected $fillable = [
        'message'
    ];

    public function district()
    {
        $this->belongsTo(District::class);
    }
}

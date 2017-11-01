<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomCase extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function picture()
    {
        return $this->hasOne("App\Picture");
    }
}

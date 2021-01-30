<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** Relation 1:1 to Profiles*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

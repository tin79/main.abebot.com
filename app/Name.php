<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    /**
     * @return array
     */
    protected $fillable = [
        'PSID','name', 'email', 'phone',
    ];


}

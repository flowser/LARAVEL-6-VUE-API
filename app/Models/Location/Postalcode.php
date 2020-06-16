<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class Postalcode extends Model
{
    protected $fillable = [
        'locality',
        'code'
    ];
}

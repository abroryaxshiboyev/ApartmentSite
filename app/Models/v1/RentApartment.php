<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentApartment extends Model
{
    use HasFactory;

    protected $guarded=[
        'id'
    ];
}

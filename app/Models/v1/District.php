<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function microdistricts()
    {
        return $this->hasMany(MicroDistrict::class);
    }

    public function orients()
    {
        return $this->hasMany(MicroDistrict::class);
    }
}

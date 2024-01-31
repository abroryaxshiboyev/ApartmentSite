<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroDistrict extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'district_id'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}

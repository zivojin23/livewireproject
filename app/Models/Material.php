<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_number',
        'material_name',
        'measurement_unit',
        'quantity'
    ];

    public function receivers()
    {
        return $this->hasMany(Receiver::class);
    }
}
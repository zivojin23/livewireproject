<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'material_name',
        'measurement_unit'
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('id_number', 'like', '%'.$search.'%')
                            ->orWhere('material_name', 'like', '%'.$search.'%');
    }
}

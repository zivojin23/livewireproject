<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'quantity',
        'supplier_id',
        'origin'
    ];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('material_id', 'like', '%'.$search.'%')
                            ->orWhere('quantity', 'like', '%'.$search.'%');
    }
}

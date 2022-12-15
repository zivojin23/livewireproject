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
        'origin',
        'price'
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}

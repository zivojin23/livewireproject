<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'address',
        'PIB',
        'MB',
        'email',
        'contact_phone',
        'contact_person'
    ];

    public function receiver()
    {
        return $this->hasOne(Receiver::class);
    }
}

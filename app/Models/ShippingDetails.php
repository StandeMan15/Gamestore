<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingDetails extends Model
{

    protected $with = ['order'];
    use HasFactory;

    public function order(): HasMany
    {
        return $this->hasMany(Order::class, 'order_number', 'order_number');
    }
}

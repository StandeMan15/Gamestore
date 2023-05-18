<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserOrder extends Model
{
    use HasFactory;

    protected $with = ['product', 'order', 'images'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function images() :HasMany
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}

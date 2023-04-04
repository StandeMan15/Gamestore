<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $with = ['user', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function status() : HasOne
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}

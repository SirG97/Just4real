<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['warehouse_id', 'name', 'phone', 'user_id', 'total', 'payment_method',
                            'paid_amount', 'txn_date', 'txn_amount', 'balance', 'discount','address'];


    protected static function boot()
    {
        parent::boot();

        // Order by name DESC
        static::addGlobalScope('warehouse', function (Builder $builder) {
            $builder->where('warehouse_id', auth()->user()->warehouse_id)->orderBy('id', 'desc');
        });
    }

    public function details(){
        return $this->hasMany(OrderDetail::class);
    }

    public function orderProducts(){
        return $this->hasManyThrough(Product::class, OrderDetail::class);
    }
}

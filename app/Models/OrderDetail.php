<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = ['warehouse_id','order_id','product_id','quantity','cost_price','unit_price','amount','discount'];

    protected static function boot()
    {
        parent::boot();
        // Order by name DESC
        static::addGlobalScope('warehouse', function (Builder $builder) {
            $builder->where('warehouse_id', auth()->user()->warehouse_id)->orderBy('id', 'desc');
        });
    }

    public function order(){
        return $this->belongsTo(OrderDetail::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

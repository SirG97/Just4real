<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [

        'warehouse_id',
        'supplier_id',
        'user_id',
        'product_id',
        'qty_before',
        'qty',
        'qty_after',

    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name DESC
        static::addGlobalScope('warehouse', function (Builder $builder) {
            $builder->where('warehouse_id', auth()->user()->warehouse_id)->orderBy('id', 'desc');
        });
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'barcode',
        'warehouse_id',
        'category_id',
        'cost_price',
        'sales_price',
        'tax',
        'weight',
        'description',
        'photo',
        'stock'
    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name ASC
        static::addGlobalScope('warehouse', function (Builder $builder) {
            $builder->where('warehouse_id', auth()->user()->warehouse_id)->orderBy('id', 'desc');
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}

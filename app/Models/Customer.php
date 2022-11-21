<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        // Order by name DESC
        static::addGlobalScope('warehouse', function (Builder $builder) {
            $builder->where('warehouse_id', auth()->user()->warehouse_id)->orderBy('id', 'desc');
        });
    }
}

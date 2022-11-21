<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'address'
    ];

    protected static function boot()
    {
        parent::boot();

        // Order by name DESC
        static::addGlobalScope('warehouse', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }
}

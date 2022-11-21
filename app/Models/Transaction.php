<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['warehouse_id','user_id','order_id','paid_amount','balance','payment_method','txn_date', 'txn_amount'];
}

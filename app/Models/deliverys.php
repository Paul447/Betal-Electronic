<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deliverys extends Model
{
    use HasFactory;
    protected $fillable=
    [
        'order_id',
        'customer_name',
        'item',
        'location',
        'amount',
        'status',
    ];
    protected $primaryKey= 'id';
}

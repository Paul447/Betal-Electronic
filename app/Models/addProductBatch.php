<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addProductBatch extends Model
{
    protected $fillable=
    [
        'batchid',
        'product',
        'costprice',
        'sellingprice',
        'availablequantity',
        'soldquantity',
        'profit',
    ];
    protected $primaryKey= 'productbatchid';
}

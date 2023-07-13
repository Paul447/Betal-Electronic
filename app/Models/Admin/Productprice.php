<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productprice extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'price',
        'product',
    ];
}

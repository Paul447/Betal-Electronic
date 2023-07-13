<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'product_name',
        'discription',
        'slug',
        'lowstockindication',
        'addedby',
        'approvedby',
        'updatedby',
        'updateapprovedby',
        'status',
        'updatestatus',
        'thumbnail',
        'featured',
        'is_disabled',
    ];
    protected $primaryKey = 'product_id';
}

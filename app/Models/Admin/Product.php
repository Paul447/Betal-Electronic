<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'brand',
        'product_name',
        'discription',

        'lowstockindication',
        'addedby',
        'approvedby',
        'updatedby',
        'updateapprovedby',
        'status',
        'updatestatus',
        'thumbnail',
        'featured',
    ];
    protected $primaryKey ='product_id';
}

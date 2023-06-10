<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name',
        'url',
        'brand_discription',
        'addedby',
        'approvedby',
        'updatedby',
        'updateapprovedby',
        'status',
        'updatestatus',


    ];
    protected $primaryKey= 'brands_id';
}

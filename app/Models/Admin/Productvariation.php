<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productvariation extends Model
{
    use HasFactory;
    protected $fillable = [
        'product',
        'variation_id',
        'variationoption_id',
    ];
    protected $primaryKey = 'id';
}

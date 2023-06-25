<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table =  'banners';

    protected $fillable = [
        'banner_img',
        'image_alt_text',
        'meta_description',
    ];
}

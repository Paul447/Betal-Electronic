<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'parent',
        'addedby',
        'approvedby',
        'updatedby',
        'updateapprovedby',
        'categorythumbnail',
        'status',
        'is_visible',
        'updatestatus',
    ];
    public function ds()
    {
        return $this->hasMany(self::class, 'categorys_id', 'parent');
    }
    public function us()
    {
        return $this->belongsTo(self::class, 'parent', 'categorys_id');
    }
    protected $primaryKey = 'categorys_id';
}

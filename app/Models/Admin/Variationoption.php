<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variationoption extends Model
{
    use HasFactory;
    protected $fillable=[
        'variation',
        'value',
        'addedby',
        'approvedby',
        'updatedby',
        'updateapprovedby',
        'status',
        'updatestatus',
    ];
    protected$primaryKey = 'variationoption_id';
}

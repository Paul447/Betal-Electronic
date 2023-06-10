<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    protected $fillable =[
       'variation_name',
        'addedby',
        'approvedby',
        'updatedby',
        'updateapprovedby',
        'status',
        'updatestatus',
    ];
    protected $primaryKey='variation_id';
}

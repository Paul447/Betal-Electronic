<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch_Migration extends Model
{
    use HasFactory;
    protected $table =  '_batch__migration';
    protected $primaryKey = 'batch_id';
}

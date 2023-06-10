<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable=
    [
        'batch_name',
    ];
    protected $primaryKey= 'id';
}

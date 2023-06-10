<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_name',
        'email',
        'role',
        'contact',
        'image',
        'password',
        'province',
        'district',
        'municipality',
        'ward',
        'user_status',
        'createdby',
        'updatedby',
        'otp',

    ];
    public function ds(){
        return $this->hasMany(self::class, 'id','createdby');
    }
    public function us(){
        return $this->belongsTo(self::class,'createdby','id');
    }

    protected $primaryKey='id';
}

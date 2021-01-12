<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alied_users extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'id','role', 'userName', 'department', 'city', 'created_at', 'updated_at'
    ];
}

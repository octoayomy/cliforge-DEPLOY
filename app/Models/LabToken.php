<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabToken extends Model
{
    protected $fillable = [

        'user_id',
        'lesson_id',
        'token',
        'hostname',
        'machine_id',
        'used',

    ];
}
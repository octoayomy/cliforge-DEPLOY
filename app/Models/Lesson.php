<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'section_id',
        'title',
        'type',
        'content',
        'duration',
        'order',
        'checker_command',
        'checker_expected',
    ];

    // =========================
    // RELATIONSHIPS
    // =========================

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
}
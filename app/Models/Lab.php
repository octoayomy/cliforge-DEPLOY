<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'instruction',
        'checker_script',
        'max_score',
    ];

    // =========================
    // RELATIONSHIPS
    // =========================

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function results()
    {
        return $this->hasMany(LabResult::class);
    }
}
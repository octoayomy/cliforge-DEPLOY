<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    // =========================
    // RELATIONSHIPS
    // =========================

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function labs()
    {
        return $this->hasMany(Lab::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
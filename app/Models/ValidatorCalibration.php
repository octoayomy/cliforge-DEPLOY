<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValidatorCalibration extends Model
{
    protected $fillable = [
        'lab_result_id',
        'rule_name',
        'teacher_decision',
        'agent_decision',
        'is_agreement',
        'note',
    ];

    protected $casts = [
        'is_agreement' => 'boolean',
    ];

    public function labResult()
    {
        return $this->belongsTo(LabResult::class);
    }
}
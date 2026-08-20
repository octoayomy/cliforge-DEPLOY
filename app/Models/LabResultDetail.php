<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class LabResultDetail extends Model
{
    protected $fillable = [
        'lab_result_id',
        'rule_name',
        'type',
        'status',
        'expected',
        'actual',
        'weight',
        'description',
        'command',
    ];

    protected function casts(): array
    {
        return [
            'weight' => 'integer',
        ];
    }

    public function labResult(): BelongsTo
    {
        return $this->belongsTo(LabResult::class);
    }

    public function getIsPassedAttribute(): bool
    {
        return strtoupper((string) $this->status) === 'PASS';
    }

    public function getIsFailedAttribute(): bool
    {
        return strtoupper((string) $this->status) === 'FAIL';
    }
    public function detailsRecords(): HasMany
    {
    return $this->hasMany(LabResultDetail::class);
    }

}
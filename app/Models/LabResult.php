<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LabResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lab_id',
        'score',
        'status',
        'duration',
        'details',
        'submitted_at',
    ];

    protected function casts(): array
    {
        return [
            'score' => 'integer',
            'duration' => 'integer',
            'details' => 'array',
            'submitted_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class);
    }

    public function detailsRecords(): HasMany
    {
        return $this->hasMany(LabResultDetail::class);
    }

    public function getIsPassedAttribute(): bool
    {
        $passingStatuses = [
            'pass',
            'passed',
            'success',
            'completed',
            'lulus',
        ];

        return in_array(strtolower((string) $this->status), $passingStatuses, true)
            || $this->score >= 75;
    }

    public function getStatusLabelAttribute(): string
    {
        if ($this->is_passed) {
            return 'PASS';
        }

        if (strtolower((string) $this->status) === 'pending') {
            return 'PENDING';
        }

        return strtoupper((string) ($this->status ?: 'FAIL'));
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeviceAuthorization extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_code',
        'hostname',
        'device_hash',
        'approved',
        'user_id',
        'expires_at',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'approved' => 'boolean',
            'expires_at' => 'datetime',
            'approved_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusLabelAttribute(): string
    {
        if ($this->approved) {
            return 'APPROVED';
        }

        if ($this->expires_at && $this->expires_at->isPast()) {
            return 'EXPIRED';
        }

        return 'PENDING';
    }

    public function getIsExpiredAttribute(): bool
    {
        return ! $this->approved && $this->expires_at && $this->expires_at->isPast();
    }
}

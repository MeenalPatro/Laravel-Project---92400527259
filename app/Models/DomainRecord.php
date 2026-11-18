<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomainRecord extends Model
{
    protected $fillable = [
        'user_id', 'domain_name', 'domain_extension', 'registrar',
        'registration_date', 'expiry_date', 'status', 'auto_renewal', 'price', 'notes',
    ];

    protected $casts = [
        'registration_date' => 'date',
        'expiry_date' => 'date',
        'auto_renewal' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayStatusAttribute(): string
    {
        if ($this->expiry_date && $this->expiry_date->lt(today())) {
            return 'expired';
        }

        if ($this->status === 'active' && $this->expiry_date && $this->expiry_date->betweenIncluded(today(), today()->addDays(30))) {
            return 'expiring';
        }

        return $this->status;
    }

    public function getDaysUntilExpiryAttribute(): ?int
    {
        return $this->expiry_date ? (int) today()->diffInDays($this->expiry_date, false) : null;
    }
}

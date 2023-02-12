<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class)->withDefault();
    }

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class)->withDefault();
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFullNameAttribute(): string
    {
        return collect([$this->last_name, $this->first_name, $this->middle_name])->filter()->implode(' ');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class)->withDefault();
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class)->withDefault();
    }
}

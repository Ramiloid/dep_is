<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFullNameAttribute(): string
    {
        return collect([$this->last_name, $this->first_name, $this->middle_name])->filter()->implode(' ');
    }

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function schedules(): HasManyThrough
    {
        return $this->hasManyThrough(Schedule::class, Plan::class);
    }
}

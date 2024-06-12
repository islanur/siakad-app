<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'semester', 'credits', 'is_must', 'type', 'description', 'department_id'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public static array $courseTypes = [
        'Teori',
        'Praktikum',
        'Praktek Lapangan',
    ];
}

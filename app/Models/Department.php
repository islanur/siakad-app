<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'head', 'description'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function lecturers(): HasMany
    {
        return $this->hasMany(Lecturer::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function headOfDepartment(): BelongsTo
    {
        return $this->belongsTo(User::class, 'head');
    }
}

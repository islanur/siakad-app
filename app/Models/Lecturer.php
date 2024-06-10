<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = ['lecturer_number', 'reg_date', 'position', 'user_id', 'department_id'];
    protected $casts = ['reg_date' => 'datetime'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public static array $position = [
        'Dosen Tetap',
        'Dosen Luar Biasa (LB)',
    ];
}

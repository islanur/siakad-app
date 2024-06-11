<?php

use App\Models\Classroom;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Course::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Lecturer::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Classroom::class)->constrained()->onDelete('cascade');
            $table->string('day');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

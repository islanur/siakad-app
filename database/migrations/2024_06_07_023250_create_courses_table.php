<?php

use App\Models\Course;
use App\Models\Department;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20)->unique();
            $table->string('name');
            $table->tinyInteger('semester');
            $table->tinyInteger('credits');
            $table->boolean('is_must')->default(true);
            $table->enum('type', Course::$courseTypes)->default('Teori');
            $table->text('description')->nullable();
            $table->foreignIdFor(Department::class)->constrained();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};

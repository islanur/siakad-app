<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'credits', 'is_must', 'type', 'description', 'department_id'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // public function enrollments(): HasMany
    // {
    //     return $this->hasMany(Enrollment::class);
    // }

    public static array $courses = [
        [
            "name" => "Algoritma dan Pemrograman",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Aljabar Linier & Matrix",
            "credits" => 3,
            "type" => "Teori"
        ],
        [
            "name" => "Analisis dan Desain Berorientasi Object",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Arsitektur Komputer",
            "credits" => 3,
            "type" => "Teori"
        ],
        [
            "name" => "Artificial Intelligence",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Bahasa Indonesia",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Bahasa Inggris",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Basis Data",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Biometric",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Business Intelligence dan Big Data",
            "credits" => 3,
            "type" => "Teori"
        ],
        [
            "name" => "Cloud Computing",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Cloud Programing",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Computer Graphic",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Computer Vision",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Data Mining",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Etika Profesi",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Ilmu Sosial Budaya Dasar",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Jaringan Komputer I",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Jaringan Komputer II",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Kalkulus I",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Kalkulus II",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Keamanan Jaringan",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Kewarganegaraan",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Kewirausahaan & Manajemen",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Kriptografi",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Logika Matematika/Logika Informatika",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Machine Learning",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Matematika Diskrit",
            "credits" => 3,
            "type" => "Teori"
        ],
        [
            "name" => "Mekantronika /Robotika",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Metode Numerik",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Metode Penelitian",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Mobile Programing",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Multimedia",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Organisasi Komputer",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Pemrograman Bahasa X (X mengacu pada nama bahasa pemrograman)",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Pemrograman Jaringan",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Pemrograman Web",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Pendidikan Agama",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Pengantar Teknologi Informasi",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Rekayasa Perangkat Lunak",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Semantic Web",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Sistem Berkas",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Sistem Operasi",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Sistem Pakar/Expert System",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Sistem Terdistribusi",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Statistik",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "Struktur Data",
            "credits" => 3,
            "type" => "Praktikum"
        ],
        [
            "name" => "Teori Bahasa dan Otomata",
            "credits" => 2,
            "type" => "Teori"
        ],
        [
            "name" => "User Interface Design (Interaksi Manusia dan Komputer)",
            "credits" => 3,
            "type" => "Praktikum"
        ]
    ];

    public static array $courseTypes = [
        'Teori',
        'Praktikum',
        'Praktek Lapangan',
    ];

    // public static array $courseNames = [
    //     'Bahasa Indonesia',
    //     'Bahasa Inggris',
    //     'Kewarganegaraan',
    //     'Ilmu Sosial Budaya Dasar',
    //     'Pendidikan Agama',
    //     'Etika Profesi',
    //     'Kewirausahaan & Manajemen',
    //     'Metode Penelitian',
    //     'Pengantar Teknologi Informasi',
    //     'Struktur Data',
    //     'Algoritma dan Pemrograman',
    //     'Organisasi Komputer',
    //     'Jaringan Komputer',
    //     'Multimedia',
    //     'Sistem Operasi',
    //     'Analisis dan Desain Berorientasi Object',
    //     'Computer Graphic',
    //     'Arsitektur Komputer',
    //     'Jaringan Komputer',
    //     'Sistem Berkas',
    //     'Basis Data',
    //     'Pemrograman Bahasa X (X mengacu pada nama bahasa pemrograman)',
    //     'Pemrograman Jaringan',
    //     'Pemrograman Web',
    //     'User Interface Design (Interaksi Manusia dan Komputer)',
    //     'Rekayasa Perangkat Lunak',
    //     'Data Mining',
    //     'Cloud Computing',
    //     'Cloud Programing',
    //     'Teori Bahasa dan Otomata',
    //     'Mobile Programing',
    //     'Sistem Terdistribusi',
    //     'Keamanan Jaringan',
    //     'Artificial Intelligence',
    //     'Sistem Pakar/Expert System',
    //     'Machine Learning',
    //     'Mekantronika/Robotika',
    //     'Biometric',
    //     'Semantic Web',
    //     'Kriptografi',
    //     'Computer Vision',
    //     'Business Intelligence dan Big Data'
    // ];
}

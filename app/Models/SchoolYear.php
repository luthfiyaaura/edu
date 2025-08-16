<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolYear extends Model
{
    use HasFactory;

    // To allow mass assignment on all attributes, use the guarded property as empty
    protected $guarded = [];

    // Defining the relationship with the Student model
    public function students()
    {
        return $this->hasMany(Student::class, 'school_year_id');
    }

    // Defining the relationship with the Major model
    public function majors()
    {
        return $this->hasMany(Major::class, 'school_year_id'); // Relasi ke Major
    }
}

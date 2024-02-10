<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'register_no',
        'student_name',
        'gender',
        'date_of_birth',
        'email',
        'father_name',
        'contact_no',
    ];
}

<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;

use App\Models\Student;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return new Student([
            'register_no' => $row[0],
            'student_name' => $row[1],
            'gender' => $row[2],
            'date_of_birth' => $row[3],
            'email' => $row[4],
            'father_name' => $row[5],
            'contact_no' => $row[6],
        ]);
    }
}

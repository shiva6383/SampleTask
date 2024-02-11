<?php

namespace App\Imports;
  
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements WithHeadingRow, ToCollection
{
    public function collection(Collection $row)
    {   
        foreach ($rows as $row) {
            Student::create([
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
}

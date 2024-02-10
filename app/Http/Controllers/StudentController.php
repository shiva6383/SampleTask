<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Dompdf\Dompdf;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;



class StudentController extends Controller
{

    public function index()
    {
        $students = Student::all();
        return view('students.dashboard', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'register_no' => 'required|unique:students',
            // Add validation rules for other fields
        ]);

        Student::create($validatedData);

        return redirect()->route('students.index');
    }

    // Implement other CRUD methods (edit, update, destroy)

    public function exportPdf()
    {
        $students = Student::all();

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('students.pdf', compact('students'))->render());
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('students.pdf');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new StudentsImport, $request->file('file'));

        return redirect()->back()->with('success', 'Students imported successfully.');
    }
}

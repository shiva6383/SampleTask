<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Dompdf\Dompdf;
use App\Imports\StudentsImport;
use Exception;



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
            'student_name' => 'required|string|regex:/^[a-zA-Z\s\'\-]+$/',
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students',
            'father_name' => 'required|string|regex:/^[a-zA-Z\s\'\-]+$/',
            'contact_no' => 'required|string',
        ]);
        Student::create($validatedData);

        return redirect()->route('dashboard')->with('success','User created successfully');
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
        
    }


    public function view($id)
    {
        $student = Student::where('id',$id)->first();

        return view('students.show',['student' => $student]);
    }

    public function edit($id)
    {
        $student = Student::where('id',$id)->first();

        return view('students.update',['student'=>$student]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'register_no' => 'required',
            'student_name' => 'required|string|regex:/^[a-zA-Z\s\'\-]+$/',
            'gender' => 'required|in:male,female,other',
            'date_of_birth' => 'required|date',
            'email' => 'required|email',
            'father_name' => 'required|string|regex:/^[a-zA-Z\s\'\-]+$/',
            'contact_no' => 'required|string',
        ]);

        $student = Student::findOrFail($request->studentId);

        $student->update([
            'register_no' => $request->register_no,
            'student_name' => $request->student_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'father_name' => $request->father_name,
            'contact_no' => $request->contact_no,
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy($id)
   {
    // Delete item from database
    Student::destroy($id);
    return redirect()->back()->with('success', 'Data deleted successfully.');
   }

}

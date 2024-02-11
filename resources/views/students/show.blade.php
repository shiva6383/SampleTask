
@extends('layouts.app')
 
@section('content')
<style>
/* Add your custom CSS styles here */
.container {
    margin-top: 50px;
}

.student-list {
    margin-top: 20px;
}

.table th, .table td {
    vertical-align: middle;
}

.table th {
    background-color: #007bff;
    color: #fff;
}

.table th, .table td {
    border: 1px solid #dee2e6;
    padding: 8px;
}
</style>
    <div class="container">
        <h1>Student View page</h1>
        <div class="action-buttons mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
        </div>        
       

        <div class="student-list">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Register No</th>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email ID</th>
                        <th>Father Name</th>
                        <th>Contact No</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $student->register_no }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->father_name }}</td>
                        <td>{{ $student->contact_no }}</td>
                        
                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection
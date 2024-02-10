
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
        <h1>Student List Dashboard</h1>
        <div class="action-buttons mb-3">
            <a href="{{ route('exportPdf') }}" class="btn btn-primary">PDF DOWNLOAD</a>
        </div>        
        <form id="importForm" action="{{ route('students.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="fileInput">
    <button type="submit" id="importButton">Import</button>
</form>

<script>
    document.getElementById('fileInput').addEventListener('change', function() {
        document.getElementById('importForm').submit();
    });
</script>

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
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->register_no }}</td>
                        <td>{{ $student->student_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->date_of_birth }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->father_name }}</td>
                        <td>{{ $student->contact_no }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

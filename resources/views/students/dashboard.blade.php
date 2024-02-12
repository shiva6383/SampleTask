
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
form button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: #c82333;
}


</style>
    <div class="container">
        <h1>Student List Dashboard</h1>
        <div class="action-buttons mb-3">
            <a href="{{ route('exportPdf') }}" class="btn btn-primary">PDF DOWNLOAD</a>
            <div style="padding-top: 15px;padding-bottom: 15px;"><a href="{{route('create')}}" class="btn btn-primary">Add new</a></div>
          
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
            </form>  

        </div> 
        
        
<!-- 
        <form id="importForm" action="{{ route('students.import') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="fileInput">
    <button type="submit" id="importButton">Import</button>
</form> -->


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
                        <th>Action</th>
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
                        <td><a href="{{route('view',$student->id)}}"><i class="fas fa-eye"></i></a>
                            <a href="{{route('edit',$student->id)}}"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $student->id }})">Delete</button>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
function confirmDelete(itemId) {
    if (confirm('Are you sure you want to delete this item?')) {
        window.location.href = '/items/' + itemId + '/delete';
    }
}
</script>

    <script>
  @if(Session::has('message'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("{{ session('message') }}");
  @endif

  @if(Session::has('error'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("{{ session('error') }}");
  @endif

  @if(Session::has('info'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("{{ session('info') }}");
  @endif

  @if(Session::has('warning'))
  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("{{ session('warning') }}");
  @endif
</script>

    @endsection
@extends('layouts.app')

@section('content')
<style>
    invalid-feedbacks {
    /* display: none; */
    width: 100%;
    margin-top: 0.25rem;
    font-size: .875em;
    
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h2>Register Student </h2>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="register_no">{{ __('Register Number') }}</label>
                            <input id="register_no" type="text" class="form-control" name="register_no" >
                        </div>
                        @error('register_no')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="student_name">{{ __('Student Name') }}</label>
                            <input id="student_name" type="text" class="form-control" name="student_name" >
                          
                        </div>
                        @error('student_name')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="gender">{{ __('Gender') }}</label>
                            <select id="gender" class="form-control" name="gender" >
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        @error('gender')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="date_of_birth">{{ __('Date of Birth') }}</label>
                            <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" >
                        </div>
                        @error('date_of_birth')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" >
                        </div>
                        @error('email')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <label for="father_name">{{ __('Father\'s Name') }}</label>
                            <input id="father_name" type="text" class="form-control" name="father_name" >
                        </div>
                        @error('father_name')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group" style="margin-bottom:15px;">
                            <label for="contact_no">{{ __('Contact Number') }}</label>
                            <input id="contact_no" type="text" class="form-control" name="contact_no" >
                        </div>
                        @error('contact_no')
                            <span class="invalid-feedbacks" role="alert">
                                <strong style="color:red;">{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <script type="text/javascript">
         iziToast.success({
             title: 'OK',
             message: '{{ $message }}',
             position: 'topRight',
         });
         
    </script>
    @endif
    @if ($message = Session::get('failure'))
    <script type="text/javascript">
        iziToast.error({
            title: 'Error',
            message: '{{ $message }}',
             position: 'topRight',
        });
    </script>
    @endif
    
@endsection

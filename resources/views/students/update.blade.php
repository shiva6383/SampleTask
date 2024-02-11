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
            <div class="card">
                <div class="card-header">{{ __('Edit Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="register_no">{{ __('Register Number') }}</label>
                            <input id="register_no" type="text" class="form-control @error('register_no') is-invalid @enderror" name="register_no" value="{{ old('register_no', $student->register_no) }}" required autofocus>
                            @error('register_no')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="studentId" value="{{$student->id}}">

                        <div class="form-group">
                            <label for="student_name">{{ __('Student Name') }}</label>
                            <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ old('student_name', $student->student_name) }}" required>
                            @error('student_name')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">{{ __('Gender') }}</label>
                            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                <option value="male" @if(old('gender', $student->gender) == 'male') selected @endif>Male</option>
                                <option value="female" @if(old('gender', $student->gender) == 'female') selected @endif>Female</option>
                                <option value="other" @if(old('gender', $student->gender) == 'other') selected @endif>Other</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">{{ __('Date of Birth') }}</label>
                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
                            @error('date_of_birth')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $student->email) }}" required>
                            @error('email')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="father_name">{{ __('Father\'s Name') }}</label>
                            <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name', $student->father_name) }}" required>
                            @error('father_name')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom:15px;">
                            <label for="contact_no">{{ __('Contact Number') }}</label>
                            <input id="contact_no" type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" value="{{ old('contact_no', $student->contact_no) }}" required>
                            @error('contact_no')
                                <span class="invalid-feedbacks" role="alert">
                                    <strong style="color:red;">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

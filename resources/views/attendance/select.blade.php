@extends('layouts.app')
@php
    use App\Http\Controllers\SubjectController;
    $subject = SubjectController::view_all_student();
@endphp


@section('content')



    <main class="py-4" style="margin-top: 65px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Select Subject</div>

                        <div class="card-body">
                            <form action="{{ url('/attendance/subject-select') }}" method="POST">
                                @csrf
                            <div class="form-group row">
                                <label class="col-md-4 text-right" for="exampleFormControlSelect1">Select Subject</label>

                                <div class="col-md-6">

                                    <select name="subject-id" class="form-control" required>
                                        @foreach($subject as $value)
                                            <option value="{{ $value->id }}">{{ $value->subject_name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-3 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        Select Subject
                                    </button>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



@endsection

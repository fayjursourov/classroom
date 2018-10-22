@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Session;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\AttendanceController;
    $attend = AttendanceController::view_all( Auth::user()->id );
@endphp

@section('content')
    <main class="py-4" style="margin-top: 65px;">
    <div class="container">
        @if( session::get('success') )
            <div class="alert alert-success">
                <strong>{{ session::get('success') }}</strong>
            </div>

        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Subject</div>

                    <div class="card-body">
                        <form action="{{ url('/attendance/delete') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Attendance Password:</label>

                                <div class="col-md-6">
                                    <select name="delete" class="form-control">
                                        @foreach($attend as $value)
                                            <option value="{{ $value->id }}">{{ $value->password }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Delete Now
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





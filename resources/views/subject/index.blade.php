@extends('layouts.app')

@section('content')
@php
        use App\Http\Controllers\Auth\LoginController;
        use App\Http\Controllers\SubjectController;

        use App\Http\Controllers\RoleController;
        use Illuminate\Support\Facades\Session;

        $role = RoleController::show(Auth::user()->email);

        if (Auth::user()->email == $role->email && $role->role == 'teacher')
        {
            $subject = SubjectController::view_all_teacher( Auth::user()->id );
        }
        else if (Auth::user()->email == $role->email && $role->role == 'student')
        {
            $subject = SubjectController::view_all_student();

        }


@endphp


<main class="py-4" style="margin-top: 65px;">
    <div class="album py-5 bg-light">
        <div class="container">

            @if( session::get('success') )
                <div class="alert alert-success">
                    <strong>{{ session::get('success') }}</strong>
                </div>

            @endif

            <div class="row">
                @foreach($subject as $value)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h3 class="card-text">{{ $value->subject_name }}</h3>
                                <p>{{ $value->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='{{ url('/subject/view/'.$value->id) }}';">View</button>
                                        @if (Auth::user()->email == $role->email && $role->role == 'teacher')
                                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href='{{ url('/subject/delete/'.$value->id) }}';">Delete</button>
                                        @endif
                                    </div>
                                    <small class="text-muted">Created: {{ $value->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

</main>

@endsection

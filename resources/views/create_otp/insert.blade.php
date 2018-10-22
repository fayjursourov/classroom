@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Session;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\SubjectController;
    $subject = SubjectController::view_all_teacher( Auth::user()->id );
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
                    <div class="card-header">Create attendance</div>

                    <div class="card-body">
                        <form action="{{ url('/attendance/create') }}" method="POST">
                            @csrf



                            <div class="form-group row">
                                <label class="col-md-4 text-right" for="exampleFormControlSelect1">Select Subject</label>

                                <div class="col-md-6">
                                    <select name="subject-id" class="form-control" required>
                                        @foreach($subject as $value)
                                            <?php $days =  $value->days; ?>
                                            @if( strpos($days, date('l')) !== false )
                                                <option id="subject-select" value="{{ $value->id }}">{{ $value->subject_name }}</option>
                                             @endif
                                        @endforeach
                                    </select>

                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Attendance Password:</label>

                                <div class="col-md-6">
                                    <input id="attendance-password" type="text" class="form-control" name="attendance-password" value="" required autofocus>
                                    <input type="hidden" name="teacher-id"value="{{ Auth::user()->id }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Expiry(min):</label>

                                <div class="col-md-6">
                                    <input type="number" id="expiry" class="form-control" name="expaire-time" value="5" min="1" max="50" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="submit" type="submit" class="btn btn-primary">
                                        Create Now
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

    <script>

        // random password
        $(document).ready(function () {
            var $r = Math.random().toString(36).substring(7);
            $("#attendance-password").attr('value', $r)
        });
    </script>

    {{--If Subject not available--}}
    <script>
        $(document).ready(function () {
            var $v = $('#subject-select').attr('value');

            if($v == undefined){
                $("#submit").attr("disabled", true);
            }
        })
    </script>


@endsection





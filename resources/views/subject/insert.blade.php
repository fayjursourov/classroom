@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Session;
    use App\Http\Controllers\Auth\LoginController;

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
                        <form method="POST" action="{{ url('/subject/create') }}">
                            @csrf
                            <input type="hidden" name="teacher-id" value="{{ Auth::user()->id }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name of classroom:</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" placeholder="Name of classroom" name="subject-name" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row" style="margin-left: 133px">
                                <label for="exampleFormControlTextarea1">Description:</label>

                                <div class="col-md-6" style="margin-left: 13px">
                                    <textarea class="form-control" style="width: 330px;" name="description" id="exampleFormControlTextarea1" placeholder="Description of Subject(optional)" rows="3"></textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="exampleFormControlSelect2" style="margin-left: 94px;">Select Weekly Class:</label>

                                <div class="col-md-6" style="margin-left: 10px;">
                                    <div class="form-group">
                                        <input id="day" type="hidden" name="day">


                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="saturday">
                                            <label class="form-check-label" for="materialUnchecked">Saturday</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="sunday">
                                            <label class="form-check-label" for="materialUnchecked">Sunday</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="monday">
                                            <label class="form-check-label" for="materialUnchecked">Monday</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="tuesday">
                                            <label class="form-check-label" for="materialUnchecked">Tuesday</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="wednesday">
                                            <label class="form-check-label" for="materialUnchecked">Wednesday</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="thursday">
                                            <label class="form-check-label" for="materialUnchecked">Thursday</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="friday">
                                            <label class="form-check-label" for="materialUnchecked">Friday</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
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
        $(document).ready(function(){
            var $input ='';
            $("option").click(function(){
                var $input2 = $( this ).attr('value');
                $input = $input2 + "," + $input;
                $('#day').attr('value',$input);
            });
        });
    </script>


@endsection





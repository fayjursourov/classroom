@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Session;
    use App\Http\Controllers\AttendanceController;


@endphp

    @php
        if( session::get('subject_id') ){
            $subject_id = session::get('subject_id');
        }
        $attend = AttendanceController::show($subject_id);
        $date_from_db = substr($attend->created_at, 2, 8);
        $current_date = date('y-m-d');
        if ($date_from_db == $current_date)
        {
            $start_date = new DateTime($attend->created_at);
            $since_start = $start_date->diff(new DateTime(date("y-m-d h:i:s")));

            $expir_duration =  $since_start->i;
        }



    @endphp

@section('content')



    <main class="py-4" style="margin-top: 65px;">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Attendance</div>

                        <div class="card-body">
                            <form action="{{ url('/subject/create') }}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Attendance Password:</label>

                                    @if($expir_duration <= $attend->expeir_time)
                                        <div class="col-md-6">
                                            <input id="attendance-password" type="text" class="form-control" name="attendance-password" value="" required autofocus>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11">
                                        @if($expir_duration <= $attend->expeir_time)
                                            <p id="demo" style="font-size: 35px; font-weight: bold; color: #aba7a7; text-shadow: 2px 2px 4px #000000; text-align: center;"></p>

                                        @endif
                                        <?php
                                            //set an date and time to work with
                                            $start = $attend->created_at;
                                            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
//                                            echo $dt->format('F j, Y, g:i a');

                                            ?>
                                        <script>
                                            // Set the date we're counting down to
                                            var countDownDate = new Date('2018-10-21 11:14:00').getTime();

                                            // Update the count down every 1 second
                                            var x = setInterval(function() {

                                                // Get todays date and time
                                                var now = Date().getTime();


                                                // Find the distance between now and the count down date
                                                var distance = countDownDate - now;

                                                // Time calculations for days, hours, minutes and seconds
                                                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                // Output the result in an element with id="demo"
                                                document.getElementById("demo").innerHTML = days + "D " + hours + "H "
                                                    + minutes + "M " + seconds + "S ";

                                                // If the count down is over, write some text
                                                if (distance < 0) {
                                                    clearInterval(x);
                                                    document.getElementById("demo").innerHTML = "EXPIRED";
                                                    $("#submit").attr("disabled", true);
                                                }
                                            }, 1000);
                                        </script>

                                    </div>



                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button id="submit" type="submit" class="btn btn-primary">
                                                Attend Now
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

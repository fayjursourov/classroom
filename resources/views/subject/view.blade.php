@extends('layouts.app')

@section('content')

@php
    use App\Http\Controllers\PostController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\CommentController;
    use App\Http\Controllers\SubjectController;
    use App\Http\Controllers\RoleController;
    use Illuminate\Support\Facades\Session;

    if (isset(Auth::user()->email) != null)
    {
        $result_role = RoleController::show(Auth::user()->email);
    }

    $subject = SubjectController::view_single($id);
    $subject_id = $id;

    $post = PostController::show_all($subject_id);



@endphp
<main class="py-4" style="margin-top: 30px;">

    {{--This section for success comment notice--}}
    @if( session::get('success-comment') )
        {{--<div class="alert alert-success">--}}
        {{--<strong>{{ session::get('success-comment') }}</strong>--}}
        {{--</div>--}}
        <script>
            alert("Comment success.")
            $('html, body').animate({
                scrollTop: $("mydiv").offset().top
            },1000);
        </script>

    @endif

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">{{ $subject->subject_name }}</h1>
                <p>{{ $subject->description }}</p>
            </div>
        </div>

        <div class="container" >
            <!-- Example row of columns -->


            <div class="row">
                {{--<div class="col-4"></div>--}}

                <div class="col-12" style="margin-bottom: 25px;">
                    @if( session::get('success') )
                        <div class="alert alert-success">
                            <strong>{{ session::get('success') }}</strong>
                        </div>

                    @endif
                    <form method="POST" action="{{ url('/post/create') }}" style="border-bottom: 1px solid #eee">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                <input type="hidden" name="subject-id" value="{{ $subject_id }}">
                                <input type="hidden" name="user-id" value="{{ Auth::user()->id }}">

                                <input type="hidden" name="role" value="{{ $result_role->role }}">
                                <textarea style="width: 504px;" class="form-control" name="description" id="exampleFormControlTextarea1" placeholder="Write Here...." rows="6"></textarea>
                            </div>
                            <div class="col-md-1"></div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4" style="text-align: right">
                                {{--<div class="form-group float-left">--}}
                                    {{--<input type="file" class="form-control-file" name="upfile">--}}
                                {{--</div>--}}
                                <button type="submit" class="btn btn-primary float-left" style="margin-bottom: 15px;">
                                    Post Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>






                    <?php
                    use App\Http\Controllers\UserController;
                    $post = PostController::show_all($subject_id);
                    ?>

                    @foreach($post as $value)
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card-body shadow-sm" style="background-color: #ffffff; margin-top: 58px;">
                                    <?php  $user_from_db = UserController::show($value->user_id) ?>
                                    <p class="user-name-post">{{ $user_from_db->name }}:</p>
                                    <p class="card-text" style="border:1px solid #eee; padding: 10px;">{{ $value->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    </div>
                                        {{--comment section--}}
                                        <?php  $comments = CommentController::show($value->id,$subject_id) ?>

                                        @foreach($comments as $data)
                                            <?php $user_info= UserController::show($data->user_id)?>
                                                {{--<{{ $data->user_id }}><{{ "/".$data->user_id }}>--}}
                                                <div class="comment">
                                                <p style="font-weight: bold;">{{ $user_info->name }}</p>
                                                <p class="card-text"><strong>Comment:</strong> {{ $data->comment }}</p>
                                            </div>
                                        @endforeach


                                    <form action="{{ url('/comment/create') }}" method="post" style="background-color: #ffffff">
                                        <input type="hidden" name="post-id" value="{{ $value->id }}">
                                        <input type="hidden" name="subject-id" value="{{ $subject_id }}">
                                        <input type="hidden" name="user-id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="role" value="{{ $result_role->role }}">
                                        @csrf
                                        <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" placeholder="Write Here...." rows="3"></textarea>
                                        <button type="submit" class="btn btn-primary comment-button">
                                            Comment
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach




















                {{--<div class="col-1"></div>--}}
            </div>









            <hr>

        </div> <!-- /container -->

    </main>





@endsection

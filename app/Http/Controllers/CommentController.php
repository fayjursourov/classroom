<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;

        $comment->post_id = $request->input('post-id');
        $comment->subject_id = $request->input('subject-id');
        $comment->user_id = $request->input('user-id');
        $comment->role = $request->input('role');
        $comment->comment = $request->input('comment');
        $subject_id = $request->input('subject-id');


        $comment->save();

        $to='/subject/view/'.$subject_id;

        return redirect($to)->with('success-comment', 'comment success');
    }


    public function show_all()
    {
        $comments= comment::all();

        return $comments;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    static public function show($post_id,$subject2_id)
    {

        $comments = DB::table('comments')->select('*')->where('post_id', $post_id)->where('subject_id', $subject2_id)->get();

        return $comments;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

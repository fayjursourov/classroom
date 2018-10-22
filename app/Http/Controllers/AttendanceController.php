<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
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
        $attend = new Attendance();

        $attend->subject_id =$request->input('subject-id');
        $attend->teacher_id =$request->input('teacher-id');
        $attend->password =$request->input('attendance-password');
        $attend->expeir_time =$request->input('expaire-time');


        $attend->save();

        return redirect('/attendance/insert')->with('success', 'Create success');

    }
    static public function view_all($user_id){
        $attend = Attendance::where('teacher_id', $user_id)->get();
        return $attend;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    static public function show($id)
    {
        $attend = Attendance::where('subject_id', $id)->first();

        return $attend;
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
    public function destroy(Request $request)
    {
        $attend = $request->input('delete');
        Attendance::destroy($attend);
        return redirect('/attendance/delete')->with('success', 'Delete success');
    }

    public function select_subject(Request $request)
    {
        $subject_id = $request->input('subject-id');

        return redirect('/st-attendance/insert/')->with('subject_id', $subject_id);
    }
}

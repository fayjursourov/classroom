<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Auth\LoginController;


class SubjectController extends Controller
{
    public function index(){

        return view('subject.index');
    }

    public function insert_form(){

        return view('subject.insert');
    }

    public function store(Request $request){

        $subject_name = $request->input('subject-name');

        $saturday = $request->input('saturday');
        if($saturday == 'on'){
            $saturday = 'Saturday';
        }

        $sunday = $request->input('sunday');
        if($sunday == 'on'){
            $sunday = 'Sunday';
        }

        $monday = $request->input('monday');
        if($monday == 'on'){
            $monday = 'Monday';
        }

        $tuesday = $request->input('tuesday');
        if($tuesday == 'on'){
            $tuesday = 'Tuesday';
        }

        $wednesday = $request->input('wednesday');
        if($wednesday == 'on'){
            $wednesday = 'Wednesday';
        }

        $thursday = $request->input('thursday');
        if($thursday == 'on'){
            $thursday= 'Thursday';
        }

        $friday = $request->input('friday');
        if($friday == 'on'){
            $friday = 'Friday';
        }

        $day = $saturday ." ". $sunday ." ". $monday ." ". $tuesday ." ". $wednesday ." ". $thursday ." ". $friday;

        $description = $request->input('description');
        $teacher_id = $request->input('teacher-id');

        $classroom = new Subject();

        $classroom->subject_name = $subject_name;
        $classroom->days = $day;
        $classroom->description = $description;
        $classroom->teacher_id = $teacher_id;


        $classroom->save();

        return redirect('/subject/insert')->with('success', 'Create success');

    }
    static public function view_all_teacher($user_id){
        $subject = Subject::where('teacher_id', $user_id)->get();
        return $subject;

    }
    static public function view_all_student(){
        $subject = Subject::all();
        return $subject;

    }
    //view function for /subject/view/id
    static public function view($subject_id){
        $subject = Subject::find($subject_id);


       return view('subject.view')->with('subject',$subject)->with('id',$subject_id);

    }
    static public function view_single($id){
        $subject = Subject::find($id);

        return $subject;

    }
    public function delete($id){
        Subject::destroy($id);
        return redirect('/subject')->with('success', 'Delete success');

    }


}

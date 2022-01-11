<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ClassListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::SELECT('SELECT * FROM subject_schedule RIGHT JOIN subjects ON subject_schedule.subjectID = subjects.subjectID');
        return view('pages.classlist.index')->with("data", $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::SELECT('SELECT * FROM student_enrollment
                            INNER JOIN users ON student_enrollment.user_id = users.id
                            RIGHT JOIN subject_schedule ON student_enrollment.subject_scheduleID = subject_schedule.subject_scheduleID
                            INNER JOIN subjects ON subject_schedule.subjectID = subjects.subjectID
                            WHERE student_enrollment.enrollmentStatus = 1  AND student_enrollment.subject_scheduleID = ?', [$id]);

        return view('pages.classlist.show')->with('data', $data);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassList $classList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassList $classList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassList  $classList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassList $classList)
    {
        //
    }
}

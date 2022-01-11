<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\StudentInformation;
use Illuminate\Http\Request;
use DB;

class StudentInformationController extends Controller
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
        try {

            $info   = new StudentInformation;
    

            $id  = $info->id            = $request->user_id;
            $info->studentAcademicLevel = $request->studentAcademicLevel;
            $info->created_at           = now();
            $info->updated_at           = now();

            $number = $request->number;

            $sql = DB::update('UPDATE users SET number = ? WHERE id = ?', [$number, $id]);
            $info->save();

            return redirect()->route('student.enrollment.create');

        } catch (\Throwable $th) {

            session()->flash('danger','Data already exists');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentInformation  $studentInformation
     * @return \Illuminate\Http\Response
     */
    public function show(StudentInformation $studentInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentInformation  $studentInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentInformation $studentInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentInformation  $studentInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentInformation $studentInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentInformation  $studentInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentInformation $studentInformation)
    {
        //
    }
}

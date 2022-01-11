<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentEnrolled;

use DB;

class StudentEnrolledController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.pages.enrollment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $subject    = DB::SELECT('SELECT * FROM subject_schedule RIGHT JOIN subjects ON subject_schedule.subjectID = subjects.subjectID');
        return view('users.pages.enrollment.create')->with('subject', $subject);
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

            $user_id                  = $request->input('user_id');
            $subjectID                = $request->input('subjectID', []);
            $subject_scheduleID       = $request->input('subject_scheduleID', []);

            foreach ($subject_scheduleID as $index => $subject) {
                $data[] = [
                    "enrollmentYear"        => now(),
                    "enrollmentStatus"      => 2,
                    "user_id"               => $user_id,
                    "subjectID"             => $subjectID[$index],
                    "subject_scheduleID"    => $subject_scheduleID[$index],
                    'created_at'            => now(),
                    "updated_at"            => now()
                ];
            }
            
            $created = StudentEnrolled::insert($data);
            
            session()->flash('success', 'Data succesfuly save');
            // return back();
            return redirect()->route('student.home.index');

        } catch (\Throwable $th) {

            // session()->flash('danger','Data already exist');
            // return back();
            throw $th;
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

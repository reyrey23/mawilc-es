<?php

namespace App\Http\Controllers;

use App\Models\StudentEnrolled;
use Illuminate\Http\Request;
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

        $data = DB::select('SELECT * FROM users INNER JOIN role_user ON role_user.user_id = users.id WHERE role_user.role_id = 2');
        return view('pages.enrollment.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = DB::SELECT('SELECT * FROM student_enrollment
                            INNER JOIN users ON student_enrollment.user_id = users.id
                            RIGHT JOIN subject_schedule ON student_enrollment.subject_scheduleID = subject_schedule.subject_scheduleID
                            INNER JOIN subjects ON subject_schedule.subjectID = subjects.subjectID
                            WHERE student_enrollment.enrollmentStatus = 2');
        return view('pages.request.index')->with("data", $data); 
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
                        "enrollmentStatus"      => 1,
                        "user_id"               => $user_id,
                        "subjectID"             => $subjectID[$index],
                        "subject_scheduleID"    => $subject_scheduleID[$index],
                        'created_at'            => now(),
                        "updated_at"            => now()
                    ];
                }
                
                $created = StudentEnrolled::insert($data);
                
                session()->flash('success', 'Data succesfuly save');
                return back();


        } catch (\Throwable $th) {

            session()->flash('danger','Data already exist');
            return back();

            // throw $th;
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentEnrolled  $studentEnrolled
     * @return \Illuminate\Http\Response
     */ 
    public function show($id)
    {   
        $data       = DB::SELECT('SELECT * FROM users INNER JOIN role_user ON role_user.user_id = users.id WHERE users.id = ?',[$id]);
        $subject    = DB::SELECT('SELECT * FROM subject_schedule RIGHT JOIN subjects ON subject_schedule.subjectID = subjects.subjectID');

        return view('pages.enrollment.show')
                ->with("data", $data)
                ->with("subject", $subject);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentEnrolled  $studentEnrolled
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentEnrolled $studentEnrolled)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentEnrolled  $studentEnrolled
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $enrollmentID               = $request->input('enrollmentID');
            $enrollmentYear             = $request->input('enrollmentYear');
            $enrollmentStatus           = $request->input('enrollmentStatus');
            $user_id                    = $request->input('user_id');
            $subjectID                  = $request->input('subjectID');
            $subject_scheduleID         = $request->input('subject_scheduleID');
    
            $sql = DB::update('UPDATE student_enrollment SET enrollmentYear = ?, user_id = ?, subjectID = ?,subject_scheduleID = ?,  enrollmentStatus = ? , updated_at = ? WHERE enrollmentID = ?',
                        [$enrollmentYear, $user_id, $subjectID, $subject_scheduleID, 1, now(), $enrollmentID]);        
            
            return back();

        } catch (\Throwable $th) {

            session()->flash('danger','Data already exist');
            return back();
            // return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentEnrolled  $studentEnrolled
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try { 
            
            DB::delete('DELETE FROM student_enrolled WHERE student_enrolledID  = ?',[$id]);
            session()->flash('success','Data is successfuly deleted');
            return back();
            
        } catch (\Throwable $th) {

            session()->flash('danger','Fail to delete data');
            return back();
            // throw $th;
        }
    }
}

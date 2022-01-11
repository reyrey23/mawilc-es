<?php

namespace App\Http\Controllers;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   

        $schedule = DB::select('SELECT * FROM subject_schedule 
                               RIGHT JOIN subjects ON subject_schedule.subjectID = subjects.subjectID 
                               ORDER BY subjects.subjectDescription ASC LIMIT 5');

        $student    = DB::table('users')
                        ->join('role_user', 'role_user.user_id' ,'=', 'users.id')
                        ->where('role_user.role_id','=','2')
                        ->get()->count();

        $instructor = DB::table('users')
                        ->join('role_user', 'role_user.user_id' ,'=', 'users.id')
                        ->where('role_user.role_id','=','3')
                        ->get()->count();

        $subjects   = DB::table('subjects')->count();

        $enrolled   = DB::SELECT('SELECT COUNT(enrollmentID) FROM student_enrollment');

                        
        return view('dashboard')
            ->with('schedule', $schedule)
            ->with('student', $student)
            ->with('instructor', $instructor)
            ->with('subjects', $subjects)
            ->with('enrolled', $enrolled);

        // return $student;
    }
}

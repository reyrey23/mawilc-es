<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Subject;
use DB;
class SubjectScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = DB::select('SELECT * FROM subject_schedule RIGHT JOIN subjects ON subject_schedule.subjectID = subjects.subjectID WHERE subject_scheduleID = subject_scheduleID');
        return view('pages.subject.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = Subject::all();
        return view('pages.subject.create',["data" => $data]);
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

            $data = [
                [
                 'subjectID'        => $request->subjectID,
                 'subjectStartTime' => $request->subjectStartTime,
                 'subjectEndTime'   => $request->subjectEndTime,
                 'subjectStatus'    => 1
                ]
            ];

            DB::table('subject_schedule')->insert($data);
            session()->flash('success', 'Data succesfuly save');
            return back();

        } catch (\Throwable $th) {

            session()->flash('danger','Data already exists');
            return back();
            // return $th;
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
        try {
            $subject_scheduleID = $request->input('subject_scheduleID');
            $subjectID          = $request->input('subjectID');
            $subjectStartTime   = $request->input('subjectStartTime');
            $subjectEndTime     = $request->input('subjectEndTime');
            $subjectStatus      = $request->input('subjectStatus');
    
            DB::update('UPDATE subject_schedule SET subjectID = ?,subjectStartTime=?,subjectEndTime=?,subjectStatus=? WHERE subject_scheduleID = ?',
                        [$subjectID, $subjectStartTime, $subjectEndTime, $subjectStatus, $subject_scheduleID]);        
        
            session()->flash('success', $Subject['subjectDescription'].' has been updated');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        try { 
            DB::delete('DELETE FROM subject_schedule WHERE subject_scheduleID = ?',[$id]);
            session()->flash('success','Data is successfuly deleted');
            return back();

        } catch (\Throwable $th) {

            session()->flash('danger','Failed to delete data');
            return back();
            // throw $th;
        }
    }
}

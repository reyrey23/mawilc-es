<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Status;


class InstructorController extends Controller
{   
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Instructor::all();
        return view('instructor.index',["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {   

        try {
            $instructor            = new Instructor;
            $instructorName        = $instructor->instructorName         = request('instructorName');
            $instructorDescription = $instructor->instructorDescription  = request('instructorDescription');

            $instructor->save();

            session()->flash('success', $instructorName.' succesfuly save');
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
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function show(Instructor $instructor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Instructor $instructor)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            
            $instructor = Instructor::findOrFail($request->instructorID);
            $instructor->update($request->all());

            session()->flash('success', $instructor['instructorName'].' has been updated');
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
     * @param  \App\Models\Instructor  $instructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instructor $instructor)
    {   
        try {

            $instructor->delete();
            session()->flash('success','Data is successfuly deleted');
            return redirect()->route('instructor.index');

        } catch (\Throwable $th) {

            session()->flash('danger','Failed to delete data');
            return back();
            //throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Status;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Subject $Subject)
    {
        $data = Subject::all();
        return view('subject.index',["data" => $data]);
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

            $Subject            = new Subject;
            $subjectCode        = $Subject->subjectCode         = request('subjectCode');
            $subjectDescription = $Subject->subjectDescription  = request('subjectDescription');

            $Subject->save();
            session()->flash('success', $subjectDescription.' succesfuly save');
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $Subject = Subject::findOrFail($request->subjectID);
            $Subject->update($request->all());

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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {   
        try {

            $subject->delete();
            session()->flash('success','Data is successfuly deleted');
            return redirect()->route('subject.index');
        
        } catch (\Throwable $th) {

            session()->flash('danger','Failed to delete data');
            return back();
            //throw $th;
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Student;
use App\Http\Requests\StudentRequest;
// use App\Http\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Auth::user());
        // dd(Student::all());
        $all_students = Auth::user()->students;
        // $all_students= Student::all();

        return view('students.list', [
            'students'=>$all_students,
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
        
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        //here is the logic to store the created student in DB
        // dd($request->user()->id);
        // dd($request->all());
        // dd(array_merge($request->all(), ['user_id'=> strval($request->user()->id)]));
        Student::create(array_merge($request->all(), ['user_id'=> strval($request->user()->id)]));
        return redirect()->route('students.list')->with('success', 'Student added successfully!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     return view('students.show');
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $id)
    {
        // dd($id);
        // $student = Student::find($id);
        return view('students.edit', ['student' => $id]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request,Student $id)
    {
        $id->IDno = $request->IDno;
        $id->name = $request->name;
        $id->age = $request->age;

        if($id->save()){
            return redirect()->route('students.list')->with('success', 'Student updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $id)
    {
        //
        if($id->delete()){
            return redirect()->route('students.list')->with('success', 'Student deleted successfully!');
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students = Student::all();
        // dd($students);
        return StudentResource::collection($students);
        // return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Student::create($request->all());
        return $this->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $id)
    {
        //
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //
        $this->authorize("view", auth()->user());
        return User::with('teacher','class')->where('role_id', Role::TEACHER)->paginate(10);
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
    public function store(StoreTeacherRequest $request)
    {
        //
        $this->authorize("create", auth()->user());
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'contact_phone' => 'required|string ',
            'class_id' => 'required|integer',
            'user_type' => 'required|string'

            // Add more validation rules as needed
        ]);

        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $this->authorize("view", auth()->user());
        //$teacher = Teacher::find($id);
        return Teacher::with('user')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, $id)
    {
        //
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return response()->json($teacher, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
        return false;
    }

    //show students

}

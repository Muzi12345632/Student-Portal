<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize("view", auth()->user());
        return User::all();
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
        $this->authorize("viewAny", auth()->user());

        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users,email",
            "user_type" => "required|in:admin,student,teacher",
        ]);

        // generate a password
        $password = Str::random(12);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "user_type" => $request->user_type,
            "password" => Hash::make($password),
        ]);


        return response()->json($user, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
         $this->authorize("view", auth()->user());
        //$student = Student::find($id);
        return User::with('class');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

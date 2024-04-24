<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

//use App\Http\Resources\StudentResource;

class StudentController extends Controller
{

    //all routes are protected now 
    /*public function __construct(){
        $this->middleware('auth');
    }*/

    //Get profile for authenticated Student

    public function profile(){

        $userdata = auth()->user();

        //Test this line of code

        $userdata->Student::with('courses')->get();

        return response()->json([
            "status" => true,
            "message" => "Profile data",
            "data"=>$userdata
        ]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Student $student)
    {
        //
        //$this->authorize("view", auth()->user());
        return Student::with('user','courses')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
        // data validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "role_id"=> "required",
            /*"contact_phone"=> "required",*/
            "age"=> "required",
            "sex"=> "required",
            "address"=>"required"
            

        ]);

        // User Model
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => $request->role_id,
            /*"contact_phone"=> $request->contact_phone,*/
            "age"=> $request->age,
            "sex"=> $request->sex,
            "address"=> $request->address
            
        ]);

        $student = new Student();
        $student->user_id = $user->id;
        $student->classes_id = $request->input('classes_id');
        $student->save();

        // Response
        return response()->json([
            "status" => true,
            "message" => "User registered successfully"
        ], 200);
        
    }

    /**
     * Display the specified resource.
     * @param \App\Models\Student
     * @return \Illuminate\Http\Response
     *
     */
    public function show($id)
    {
        //
        //$this->authorize("view", auth()->user());
        
        return Student::with('user','courses')->where('id', $id)->paginate(25);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }



    /**
     * Register a student for a class.
     * 
     * @param Request $request
     * 
     * @return \Illuminate\Http\Response
     * 
     * /
     */

    public function registerClass(Request $request){

        // Validate the request
        $request->validate([
            'classes_id' => 'required',
            'courses' => 'required|array',
            'courses.*' => 'required|exists:courses,id',
        ]);

        // Create a new student
        $student = new Student();
        $student->classes_id = $request->input('classes_id');
        $student->save();

        // Attach the selected courses to the student
        $student->courses()->sync($request->input('courses'));

        return response()->json(['message'=>'Student successsfully registered for class'], 200);
    }



}

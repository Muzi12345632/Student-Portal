<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

//use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize("view", auth()->user());
        return Student::paginate();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        /*$this->authorize("create", auth()->user());
        return Student::all()*/;
        $this->authorize("create", auth()->user());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'sex' => 'required|string',
            'age' => 'required|string ',
            'student_class_id' => 'required|integer',
            'user_type' => 'required|string',
            'address' => 'required|string',
            'grade' => 'required|string',
            'password' => 'required|string|min:6'
            // Add more validation rules as needed
        ]);


        Student::create([

            "name"=>$request->name,
            "email"=>$request->email,
            "sex"=>$request->sex,
            "age"=>$request->age,
            "student_class_id"=>$request->student_class_id,
            "user_type"=>$request->user_type,
            "grade"=>$request->grade,
            "address"=>$request->address,
            "password"=>Hash::make($request->password)
        ]);

        $data = auth()->user();

        return response()->json(["message"=> "Student successsfully created", "status"=>true, "data"=>$data], 201);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        //
        $this->authorize("create", auth()->user());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'sex' => 'required|string',
            'age' => 'required|string ',
            'student_class_id' => 'required|integer',
            'user_type' => 'required|string',
            'address' => 'required|string',
            'grade' => 'required|string',
            'password' => 'required|string|min:6'

            // Add more validation rules as needed
        ]);

        Student::create([

            "name"=>$request->name,
            "email"=>$request->email,
            "sex"=>$request->sex,
            "age"=>$request->age,
            "student_class_id"=>$request->student_class_id,
            "user_type"=>$request->user_type,
            "grade"=>$request->grade,
            "address"=>$request->address,
            "password"=>Hash::make($request->password)
        ]);

        $data1v = auth()->user();

        /*$student = Student::create($request->all());*/
        /*$student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->sex = $request->sex;
        $student->age = $request->age;
        $student->student_class_id = $request->student_class_id;
        $student->user_type = $request->user_type;
        $student->grade = $request->grade;
        $student->address = $request->address;
        $student->password = Hash::make($request->password);
        $student->save();*/

        return response()->json(["message"=> "Student successsfully created", "status"=>true, "data"=>$data1], 201);
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
        $this->authorize("viewAny", auth()->user());
        $student = Student::find($id);
        return $student;
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

        //validate
        $request->validate([
            'class_id' => 'required|exists:classes.id',
        ]);

        //get authenticated students
        $student->auth()->user();

        if($student->class()->where('class_id', $request->class_id)->exists())
        {
            return response()->json(['message'=> 'Student already registered for this class'], 400);
        }

        $student->class()->attach($request->class_id);

        return response()->json(['message'=>'Student successsfully registered for class'], 200);
    }



}

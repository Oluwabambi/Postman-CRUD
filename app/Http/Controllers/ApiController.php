<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function index() 
    {
        $students = Student::all();
        return response()->json(['students'=>$students], 200);
    }

    public function show($id) 
    {
        $students = Student::find($id); 
        if($students)
        {
            return response()->json(['students'=>$students], 200);
        }
        else 
        {
            return response()->json(['message'=>'No Student Found'], 404);
        }
    }


    public function create(Request $request)
    {
        $request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|max:255'
        ]);
        
        $student = new Student();

        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);

        $student->save();
        return response()->json($student);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|max:255'
        ]);
        
        $student = Student::find($id);
        if($student)
        {
            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->update();

            return response()->json(['message'=>'Student Updated Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'No Student Found'], 404);
        }           
    }

    public function destroy($id) 
    {
        $student = Student::find($id);
        if($student)
        {
            $student->delete();
            return response()->json(['message'=>'Student Deleted Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Student Not Found'], 404);
        }
    }   
}

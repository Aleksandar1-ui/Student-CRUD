<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudent() {
        return response()->json(Student::all(),200);
    }
    public function getStudentById($id) {
        $student = Student::find($id);
        if(is_null($student)) {
            return response()->json(['message'=>'Student Not Found'],404);
        }
        return response()->json($student::find($id),200);
    }
    public function addStudent(Request $request) {
        $student = Student::create($request->all());
        return response($student,201);
    }
    public function updateStudent(Request $request, $id) {
        $student = Student::find($id);
        if(is_null($student)) {
            return response()->json(['message'=>'Student Not Found'],404);
        }
        $student->update($request->all());
        return response($student,200);
    }
    public function deleteStudent(Request $request, $id) {
        $student = Student::find($id);
        if(is_null($student)) {
            return response()->json(['message'=>'Student Not Found'],404);
        }
        $student->delete();
        return response()->json(null,204);
    }
}
?>
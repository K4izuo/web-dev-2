<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all();
        
        return view('layouts.StudentView', compact('students'));
    }

    public function createNewSTD(Request $request){

      $request->validate([
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'address' => 'required'
      ]);

      $addNewSTD = new Students();
      $addNewSTD->name = $request->name;
      $addNewSTD->age = $request->age;
      $addNewSTD->gender = $request->gender;
      $addNewSTD->address = $request->address;
      $addNewSTD->save();

      return back()->with('success', 'Student added successfully!');
    }
}

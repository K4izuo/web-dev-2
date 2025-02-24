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

  public function createNewSTD(Request $request)
  {

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

  public function updateSTD(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'age' => 'required',
      'gender' => 'required',
      'address' => 'required'
    ]);

    $student = Students::findOrFail($request->route('id'));

    $student->name = $request->name;
    $student->age = $request->age;
    $student->gender = $request->gender;
    $student->address = $request->address;
    $student->save();

    return redirect()->route('std.viewAll')->with('success', 'Student updated successfully!');
  }

  public function deleteSTD(Request $request) {
    $student = Students::findOrFail($request->id);
    $student->delete();

    return redirect()->route('std.viewAll')->with('success', 'Student deleted successfully!');
  }
}

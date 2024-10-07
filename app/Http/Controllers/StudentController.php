<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('updated_at', 'desc')->paginate(10);
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'nis' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'image' => 'image|file|max:3072|required',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $student = new Student([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'number' => $request->input('number'),
            'nis' => $request->input('nis'),
            'address' => $request->input('address'),
            'image' => $imagePath,
        ]);

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'nis' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'image' => 'image|file|max:3072|nullable',
        ]);

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->number = $request->input('number');
        $student->nis = $request->input('nis');
        $student->address = $request->input('address');

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete('public/' . $request->oldImage);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $student->image = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->image) {
            Storage::delete('public/' . $student->image);
        }
        $student->delete();
        return redirect()->route('students.index');
    }
}

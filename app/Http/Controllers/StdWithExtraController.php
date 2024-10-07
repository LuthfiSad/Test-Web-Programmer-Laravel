<?php

namespace App\Http\Controllers;

use App\Models\StdWithExtra;
use App\Models\Student;
use App\Models\Extracurricular;
use Illuminate\Http\Request;

class StdWithExtraController extends Controller
{
    public function index()
    {
        $stdWithExtras = StdWithExtra::with(['student', 'extracurricular'])->get();
        return view('std_with_extras.index', compact('stdWithExtras'));
    }

    public function create()
    {
        $students = Student::all();
        $extracurriculars = Extracurricular::all();
        return view('std_with_extras.create', compact('students', 'extracurriculars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_std' => 'required|exists:students,id',
            'id_extras' => 'required|exists:extracurriculars,id',
        ]);

        StdWithExtra::create($request->all());

        return redirect()->route('std_with_extras.index')->with('success', 'Extracurricular added successfully.');
    }

    public function show(StdWithExtra $stdWithExtra)
    {
        return view('std_with_extras.show', compact('stdWithExtra'));
    }
}

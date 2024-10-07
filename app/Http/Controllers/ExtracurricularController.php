<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extracurriculars = Extracurricular::orderBy('created_at', 'desc')->paginate(10);
        return view('extras.index', compact('extracurriculars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
        ]);

        $extracurricular = new Extracurricular([
            'name' => $request->input('name'),
            'start_year' => $request->input('start_year'),
        ]);

        $extracurricular->save();

        return redirect()->route('extracurriculars.index')->with('success', 'Extracurricular created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extracurricular $extracurricular)
    {
        return view('extras.show', compact('extracurricular'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extracurricular $extracurricular)
    {
        return view('extras.edit', compact('extracurricular'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extracurricular $extracurricular)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_year' => 'required|integer|digits:4',
        ]);

        $extracurricular->name = $request->input('name');
        $extracurricular->start_year = $request->input('start_year');

        $extracurricular->save();

        return redirect()->route('extracurriculars.index')->with('success', 'Extracurricular updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extracurricular $extracurricular)
    {
        $extracurricular->delete();
        return redirect()->route('extracurriculars.index')->with('success', 'Extracurricular deleted successfully');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Personnel;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personnels = Personnel::paginate(10);
        return view('personnels.index', compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('personnels.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personnels',
            'groupement' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:255',
            'grade_id' => 'required|integer|exists:grades,id',
        ]);

        Personnel::create($request->all());

        return redirect()->route('personnels.index')->with('success', 'Personnel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personnel $personnel)
    {
        return view('personnels.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personnel $personnel)
    {
        $grades = Grade::all();
        return view('personnels.edit', compact('personnel', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personnels,email,' . $personnel->id,
            'groupement' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:255',
            'grade_id' => 'required|integer|exists:grades,id',
        ]);

        $personnel->update($request->all());

        return redirect()->route('personnels.index')->with('success', 'Personnel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personnel $personnel)
    {
        $personnel->affectations()->delete();
        $personnel->delete();

        return redirect()->route('personnels.index')->with('success', 'Personnel deleted successfully.');
    }
}

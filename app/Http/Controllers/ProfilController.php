<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profils = Profil::all();
        return view('profils.index', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profils.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Profil::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('profils.index')->with('success', 'Profil created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        return view('profils.show', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        return view('profils.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {
        $request->validate([  
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $profil->update($request->all());

        return redirect()->route('profils.index')->with('success', 'Profil updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        $profil->affectations()->delete();
        $profil->delete();

        return redirect()->route('profils.index')->with('success', 'Profil deleted successfully.');   
    }
}

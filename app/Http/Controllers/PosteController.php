<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $grades = Grade::all();
        $query = Poste::query();

        // Filter by search term (name)
        if ($request->filled('search')) {
            $query->where('code', 'like', '%' . $request->search . '%');
        }

        // Filter by grade
        if ($request->filled('grade_id')) {
            $query->where('grade_id', $request->grade_id);
        }

        // Filter by sexe
        if ($request->filled('sexe')) {
            $query->where('sexe', $request->sexe);
        }

        // Add filters for groupement and service (assuming they are columns in your table)
        if ($request->filled('groupement_id')) {
            $query->where('groupement_id', $request->groupement_id);
        }

        if ($request->filled('service_id')) {
            $query->where('service_id', $request->service_id);
        }

        $postes = $query->orderBy('code')->paginate(10); // Order by code

        return view('postes.index', compact('postes', 'grades')); // Pass grades for the filter
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grades = Grade::all();
        return view('postes.create', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'nb_lits' => 'required|integer',
            'tel' => 'required|string|max:255',
            'type_acces' => 'required|string|max:255',
            'code_acces' => 'nullable|string|max:255',
            'sexe' => 'required|string|max:255',
            'groupement' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'statut' => 'nullable|string|max:255',
            'type_renfort' => 'nullable|string|max:255',
            'observation' => 'nullable|string',
            'modif_annee_pro' => 'nullable|string|max:255',
            'grade_id' => 'required|integer|exists:grades,id',
        ]);

        Poste::create($request->all());

        return redirect()->route('postes.index')->with('success', 'Poste created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poste $poste)
    {
        return view('postes.show', compact('poste'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poste $poste)
    {
        $grades = Grade::all();
        return view('postes.edit', compact('poste', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poste $poste)
    {
        $request->validate([
            'code' => 'required|string|max:255',
            'nb_lits' => 'required|integer',
            'tel' => 'required|string|max:255',
            'type_acces' => 'required|string|max:255',
            'code_acces' => 'nullable|string|max:255',
            'sexe' => 'required|string|max:255',
            'groupement' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'statut' => 'nullable|string|max:255',
            'type_renfort' => 'nullable|string|max:255',
            'observation' => 'nullable|string',
            'modif_annee_pro' => 'nullable|string|max:255',
            'grade_id' => 'required|integer|exists:grades,id',
        ]);

        $poste->update($request->all());

        return redirect()->route('postes.index')->with('success', 'Poste updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poste $poste)
    {
        $poste->affectations()->delete();
        $poste->delete();

        return redirect()->route('postes.index')->with('success', 'Poste deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Personnel;
use App\Models\Poste;
use App\Models\Profil;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Profil $profil)
    {
        $affectations = Affectation::where('profil_id', $profil->id)->paginate(10);
        return view('affectations.index', compact('profil', 'affectations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Profil $profil)
    {
        $postes = Poste::all();
        $personnels = Personnel::all();

        return view('affectations.create', compact('profil', 'postes', 'personnels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Profil $profil)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'chef_de_poste' => 'nullable|boolean',
            'poste_id' => 'required|exists:postes,id',
            'personnel_id' => 'required|exists:personnels,id',
        ]);

        $poste = Poste::findOrFail($request->poste_id);
        $personnel = Personnel::findOrFail($request->personnel_id);

        if ($poste->sexe !== $personnel->sexe) {
            return redirect()->back()->withErrors(['error' => 'Le sexe du personnel doit correspondre au sexe du poste.']);
        }

        $overlappingAffectation = $profil->affectations()->where('personnel_id', $personnel->id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('date_debut', '<=', $request->date_fin)
                        ->where('date_fin', '>=', $request->date_debut);
                })->orWhere(function ($query) use ($request) {
                    $query->where('date_debut', '>=', $request->date_debut)
                        ->where('date_fin', '<=', $request->date_fin);
                });
            })
            ->first();

        if ($overlappingAffectation) {
            return redirect()->back()->withErrors(['error' => 'Le personnel est déjà affecté pendant cette période.']);
        }

        $posteOccupations = $profil->affectations()->where('poste_id', $poste->id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('date_debut', '<=', $request->date_fin)
                        ->where('date_fin', '>=', $request->date_debut);
                })->orWhere(function ($query) use ($request) {
                    $query->where('date_debut', '>=', $request->date_debut)
                        ->where('date_fin', '<=', $request->date_fin);
                });
            })
            ->count();

        if ($posteOccupations >= $poste->nb_lits) {
            return redirect()->back()->withErrors(['error' => 'Le poste est déjà complet pendant cette période.']);
        }

        if ($request->chef_de_poste) {
            $existingChef = $profil->affectations()->where('poste_id', $poste->id)
                ->where(function ($query) use ($request) {
                    $query->where(function ($query) use ($request) {
                        $query->where('date_debut', '<=', $request->date_fin)
                            ->where('date_fin', '>=', $request->date_debut);
                    })->orWhere(function ($query) use ($request) {
                        $query->where('date_debut', '>=', $request->date_debut)
                            ->where('date_fin', '<=', $request->date_fin);
                    });
                })
                ->where('chef_de_poste', true)
                ->first();
    
            if ($existingChef) {
                return redirect()->back()->withErrors(['error' => 'Il ne peut y avoir qu\'un seul chef de poste par poste.']);
            }
        }
    
        $profil->affectations()->create([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'chef_de_poste' => $request->chef_de_poste,
            'poste_id' => $request->poste_id,
            'personnel_id' => $request->personnel_id,
        ]);
    
        return redirect()->route('affectations.index', $profil)->with('success', 'Affectation créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil, Affectation $affectation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil, Affectation $affectation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil, Affectation $affectation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil, Affectation $affectation)
    {
        $affectation->delete();
        return redirect()->route('affectations.index', compact('profil'))->with('success', 'Personnel deleted successfully.');
    }
}

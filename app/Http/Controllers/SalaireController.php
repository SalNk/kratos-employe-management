<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalaireRequest;
use App\Http\Requests\UpdateSalaireRequest;
use App\Models\Employe;
use App\Models\Salaire;
use Exception;
use Illuminate\Http\Request;

class SalaireController extends Controller
{
    public function index()
    {
        $salaires = Salaire::with('employe')->paginate(10);

        return view('salaire.index', compact('salaires'));
    }

    public function create()
    {
        $employes = Employe::all();
        return view('salaire.create', compact('employes'));
    }

    public function edit(Salaire $salaire)
    {
        $employes = Employe::all();
        return view('salaire.edit', compact('salaire', 'employes'));
    }

    public function update(Salaire $salaire, UpdateSalaireRequest $request)
    {
        $salaire->update([
            'employe_id' => $request->employe_id,
            'montant' => $request->montant,
        ]);

        return redirect()->route('salaire.index')->with('success', 'Salaire mis à jour');
    }

    public function store(SalaireRequest $request)
    {
        $query = Salaire::create($request->all());

        if ($query) {
            return redirect()->route('salaire.index')->with('success', 'Salaire ajouté avec succès');
        }
    }

    public function delete(Salaire $salaire)
    {
        try {
            $salaire->delete();

            return redirect()->route('salaire.index')->with('success', 'Salaire supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function search(Request $request)
    {
        $word = strtolower($request->word);
        $salaires = Salaire::with('employe')
            ->where(function ($query) use ($word) {
                $query->orWhereRaw('LOWER(montant) LIKE ?', ['%' . $word . '%'])
                    ->orWhereHas('employe', function ($q) use ($word) {
                        $q->whereRaw('LOWER(nom) LIKE ?', ['%' . $word . '%']);
                    });
            })
            ->paginate(10);

        return view('salaire.index', compact('salaires'));
    }
}

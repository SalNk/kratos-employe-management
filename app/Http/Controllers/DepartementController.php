<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementRequest;
use App\Models\Departement;
use Exception;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    // renvoie la page d'affichage
    public function index()
    {
        $departements = Departement::with('employes')->paginate(10);
        return view('departement.index', compact('departements'));
    }

    // renvoie la page de création
    public function create()
    {
        return view('departement.create');
    }

    // la fonction pour enregistrer les infos
    public function store(Departement $departement, saveDepartementRequest $request)
    {
        try {
            $departement::create([
                'name' => $request->name,
                'status' => $request->status,
            ]);
            return redirect()->route('departement.index')->with('success', 'Département crée avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    // la fonction pour afficher la page de modification
    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('departement.edit', compact('departement'));
    }

    // la fonction pour modifier les infos
    public function update($id, saveDepartementRequest $request)
    {
        try {
            $departement = Departement::findOrFail($id);
            $departement->name = $request->name;
            $departement->status = $request->status;

            $departement->save();
            return redirect()->route('departement.index')->with('success', 'Département mis à jour');
        } catch (Exception $e) {
            dd($e);
        }
    }

    // la fonction pour supprimer l'enregistrement
    public function delete($id)
    {
        try {
            $departement = Departement::findOrFail($id);
            $departement->delete();

            return redirect()->route('departement.index')->with('success', 'Département supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function search(Request $request)
    {
        $departements = Departement::with('employes')
            ->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($request->word) . '%'])
            ->orWhereRaw('LOWER(status) LIKE ?', ['%' . strtolower($request->word) . '%'])
            ->paginate(10);

        return view('departement.index', compact('departements'));
    }
}
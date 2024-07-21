<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Models\Departement;
use App\Models\Employe;
use Exception;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::with('departement')->paginate(10);

        return view('employe.index', compact('employes'));
    }
    public function create()
    {
        $departements = Departement::all();
        return view('employe.create', compact('departements'));
    }

    public function edit(Employe $employe)
    {
        $departements = Departement::all();
        return view('employe.edit', compact('employe', 'departements'));
    }

    public function update(Employe $employe, UpdateEmployeRequest $request)
    {
        $employe->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'contact' => $request->contact,
            'departement_id' => $request->departement_id
        ]);

        return redirect()->route('employe.index')->with('success', 'Employé mis à jour');
    }

    public function store(EmployeRequest $request)
    {
        $query = Employe::create($request->all());

        if ($query) {
            return redirect()->route('employe.index')->with('success', 'Employé ajouté avec succès');
        }
    }

    public function delete(Employe $employe)
    {
        try {
            $employe->delete();

            return redirect()->route('employe.index')->with('success', 'Employé supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }

    public function search(Request $request)
    {
        $employes = Employe::with('departement')
            ->whereRaw('LOWER(nom) LIKE ?', ['%' . strtolower($request->word) . '%'])
            ->orWhereRaw('LOWER(email) LIKE ?', ['%' . strtolower($request->word) . '%'])
            ->orWhereRaw('LOWER(prenom) LIKE ?', ['%' . strtolower($request->word) . '%'])
            ->paginate(10);

        return view('employe.index', compact('employes'));
    }
}

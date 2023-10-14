<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeRequest;
use App\Models\Departement;
use App\Models\Employe;
use Exception;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $employes = Employe::paginate(10);
        return view('employe.index', compact('employes'));
    }
    public function create()
    {
        $departements = Departement::all();
        return view('employe.create', compact('departements'));
    }
    public function edit(Employe $employe)
    {
        return view('employe.edit', compact('employe'));
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
}
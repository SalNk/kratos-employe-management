<?php

namespace App\Http\Controllers;

use App\Http\Requests\RendezVousRequest;
use App\Http\Requests\UpdateRendezVousRequest;
use App\Models\Employe;
use App\Models\RendezVous;
use Exception;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    public function index()
    {
        $rdvs = RendezVous::paginate(10);
        return view('rdv.index', compact('rdvs'));
    }

    public function create()
    {
        return view('rdv.create');
    }

    public function edit(RendezVous $rdv)
    {
        return view('rdv.edit', compact('rdv'));
    }

    public function update(RendezVous $rdv, UpdateRendezVousRequest $request)
    {
        $rdv->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        return redirect()->route('rdv.index')->with('success', 'Rendez-vous mis à jour');
    }

    public function store(RendezVousRequest $request)
    {
        $query = RendezVous::create($request->all());

        if ($query) {
            return redirect()->route('rdv.index')->with('success', 'Rendez-vous ajouté avec succès');
        }
    }

    public function delete(RendezVous $rdv)
    {
        try {
            $rdv->delete();

            return redirect()->route('rdv.index')->with('success', 'Rendez-vous supprimé');

        } catch (Exception $e) {
            dd($e);
        }
    }
}

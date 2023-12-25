<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeRequest;
use App\Models\Departement;
use App\Models\Employe;
use App\Repository\Worker\WorkerContract;
use App\Utils\ConstantName;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    protected WorkerContract $workerContract;

    public function __construct(WorkerContract $_workerContract)
    {
        $this->workerContract = $_workerContract;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::with('departement')->paginate(10);

        return view('employe.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('employe.create', compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeRequest $request)
    {
        $inputs = $request->all();
        $this->workerContract->toAdd($inputs);

        return redirect()->route('employe.index')->with('success', ConstantName::STORE_WORKER_SUCEESS);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        $departements = Departement::all();
        return view('employe.edit', compact('employe', 'departements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inputs = $request->all();

        $item = $this->workerContract->toGetById($id);
        if (empty($item)) {
            return back();
        }
        $this->workerContract->toUpdate($inputs, $id);
        return redirect()->route('employe.index')->with('success', ConstantName::UPDATE_WORKER_SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->workerContract->toGetById($id);

        if (empty($item)) {
            return back();
        }
        $this->workerContract->toDelete($id);
        return redirect()->route('employe.index')->with('success', ConstantName::DELETE_WORKER_SUCCESS);
    }
}

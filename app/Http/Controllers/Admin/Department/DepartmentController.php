<?php

namespace App\Http\Controllers\Admin\Department;

use App\Models\Departement;
use App\Utils\ConstantName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\saveDepartementRequest;
use App\Repository\Department\DepartmentContract;

class DepartmentController extends Controller
{
    protected DepartmentContract $departmentContract;

    public function __construct(
        DepartmentContract $_departmentContract
    ) {
        $this->departmentContract = $_departmentContract;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::paginate(10);
        return view('departement.index', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(saveDepartementRequest $request)
    {
        $inputs = $request->all();

        $this->departmentContract->toAdd($inputs);

        return redirect()->route('departement.index')->with('success', ConstantName::STORE_DEPARTMENT_SUCCESS);

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
    public function edit(int $id)
    {
        return view('departement.edit', compact('departement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(saveDepartementRequest $request, int $id)
    {
        $inputs = $request->all();

        $item = $this->departmentContract->toGetById($id);
        if (empty($item)) {
            return back();
        }
        $this->departmentContract->toUpdate($inputs, $id);
        return redirect()->route('admin.course')->with('message', ConstantName::UPDATE_DEPARTMENT_SUCCESS);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->departmentContract->toGetById($id);

        if (empty($item)) {
            return back();
        }
        $this->departmentContract->toDelete($id);
        return redirect()->route('departement.index')->with('success', ConstantName::DELETE_DEPARTMENT_SUCCESS);
    }
}

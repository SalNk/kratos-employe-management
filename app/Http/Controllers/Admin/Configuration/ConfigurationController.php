<?php

namespace App\Http\Controllers\Admin\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfigurationRequest;
use App\Models\Configuration;
use App\Repository\Configuration\ConfigurationContract;
use App\Utils\ConstantName;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    protected ConfigurationContract $configContract;

    public function __construct(ConfigurationContract $_configContract)
    {
        $this->configContract = $_configContract;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configs = Configuration::latest()->paginate(10);
        return view('config.index', compact('configs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('config.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConfigurationRequest $request)
    {
        $inputs = $request->all();

        $this->configContract->toAdd($inputs);
        return redirect()->route('config.index')->with('succes', ConstantName::STORE_CONFIG_SUCEESS);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = $this->configContract->toGetById($id);

        if(empty($item)){
            return back();
        }
        $this->configContract->toDelete($id);
        return redirect()->route('config.index')->with('success', ConstantName::DELETE_CONFIG_SUCCESS);
    }
}

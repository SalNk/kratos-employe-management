<?php

namespace App\Http\Controllers;

use App\Models\Employe;
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
        return view('employe.create');
    }
    public function edit(Employe $employe)
    {
        return view('employe.edit', compact('employe'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asignacion;
use App\Models\area;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class AsignacionController extends Controller
{

    use HasRoles;

    public function index()
    {

    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        asignacion::create($request->all());
        return redirect()->route('profesor.index')->with('success', 'Area asignada correctamente');
        
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

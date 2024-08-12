<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\area;
use App\Models\asignacion;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Mockery\Undefined;

use function PHPUnit\Framework\isFalse;

class ProfesorController extends Controller
{

    use HasRoles;

    public function index()
    {
        return view('profesor.home');
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);

        $usuario=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'entidad_id' => $request->entidad_id ?? null,
        ]);
        $usuario->roles()->sync(3);

        return redirect()->route('profesor.index')->with('success', 'Profesor creado correctamente');

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
        //
    }
}

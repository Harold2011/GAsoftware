<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    use HasRoles;

    public function index()
    {
        
        $usuarios=User::all();
        $roles=Role::all();
        $dataUsuarios=[];
        foreach ($usuarios as $usuario){
            $role=$usuario->roles;
            foreach ($role as $rol){
               $dataUsuario=[
                'id'=>$usuario->id,
                'name'=>$usuario->name,
                'role'=>$rol->name,
                'email'=>$usuario->email
               ];
               array_push($dataUsuarios,$dataUsuario);
            }
        }
        return view('admin.usuarios.usuarios', compact('dataUsuarios','roles'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    // dd($request->role);
 
    // Validar los datos del formulario
    // $request->validate([
    //     'name' => 'required|string|max:255',
    //     'email' => 'required|string|email|max:255|unique:users',
    //     'password' => 'required|string|min:8|confirmed',
    //     'role' => 'required',
    //     // Añadir otras validaciones según sea necesario, como rol_id y entidad_id
    // ]);

    $usuario=User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        // Asignar rol_id y entidad_id si se proporcionan en la solicitud
        // 'rol_id' => $request->rol_id ?? null,
        'entidad_id' => $request->entidad_id ?? null,
    ]);

    $usuario->roles()->sync($request->role);

    return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
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

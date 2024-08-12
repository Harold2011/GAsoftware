<?php

namespace App\Http\Controllers\Malla;

use App\Http\Controllers\Controller;
use App\Models\malla;
use App\Models\grado;
use App\Models\unididactica;
use App\Models\area;
use App\Models\componentes;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unididactica = unididactica::all()->last();
        $id=$unididactica->id;
        $componentes=componentes::where('unididactica_id',$id)->get();
        $exitoso=true;
        $mensaje="Componentes creados correctamente";
        return view('admin.malla.estandar', compact('componentes','exitoso','mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        if($request->redirect==true){
            return redirect()->route('componente.create')->with('success', 'Componentes creados correctamente.');              
        }else{
            componentes::create($request->all());
        }     
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $componentes=componentes::where('unididactica_id',$request->elemento)->get();
        return $componentes;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(malla $malla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, malla $malla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(malla $malla)
    {
        //
    }
}

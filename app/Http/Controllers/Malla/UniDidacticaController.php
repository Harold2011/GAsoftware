<?php

namespace App\Http\Controllers\Malla;

use App\Http\Controllers\Controller;
use App\Models\malla;
use App\Models\grado;
use App\Models\unididactica;
use App\Models\area;
use Illuminate\Http\Request;
use Mockery\Undefined;

class UniDidacticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grado = grado::all();
        $area = area::all();
        return view('admin.malla.unididactica', compact('grado', 'area'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unididactica = unididactica::all()->last();
        $id=$unididactica->id;
        return view('admin.malla.componente', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        unididactica::create($request->all());
        return redirect()->route('unidad.create')->with('success', 'Entidad creada correctamente.');
        
        // dd($request->all);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $unididactica=unididactica::where('grado_id',$request->grado)
                                    ->where('area_id',$request->area)->get();
        return $unididactica;
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

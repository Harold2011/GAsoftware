<?php

namespace App\Http\Controllers\Malla;

use App\Http\Controllers\Controller;
use App\Models\malla;
use App\Models\unididactica;
use App\Models\componentes;
use App\Models\estandar;
use Illuminate\Http\Request;

class EstandarController extends Controller
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
        $componentes_id=array();
        for($i=0;$i<count($componentes);$i++){  
                array_push($componentes_id,$componentes[$i]->id);
        }  
        $estandares=estandar::whereIn('componente_id',$componentes_id)->get();
        $exitoso=true;
        $mensaje="Estandares creados correctamente";
        return view('admin.malla.competencia', compact('estandares','exitoso','mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        estandar::create($request->all());
        $data=[];
        $data['estandar']=$request->name;
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $estandares=estandar::where('componente_id',$request->elemento)->get();
        return $estandares;
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

<?php

namespace App\Http\Controllers\Malla;

use App\Http\Controllers\Controller;
use App\Models\malla;
use App\Models\unididactica;
use App\Models\componentes;
use App\Models\competencia;
use App\Models\estandar;
use App\Models\desempeño;
use Illuminate\Http\Request;

class DesempeñoController extends Controller
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
        $estandares_id=array();
        for($i=0;$i<count($estandares);$i++){
            array_push($estandares_id,$estandares[$i]->id);
        }
        $competencias=competencia::whereIn('estandar_id',$estandares_id)->get();
        $competencias_id=array();
        for($i=0;$i<count($competencias);$i++){
            array_push($competencias_id,$competencias[$i]->id);
        }
        $desempeños=desempeño::whereIn('competencia_id',$competencias_id)->get();
        $exitoso=true;
        $mensaje="Desempeños creados correctamente";
        return view('admin.malla.indicadorDesempeño', compact('desempeños','exitoso','mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        desempeño::create($request->all());
        $data=[];
        $data['desempeño']=$request->name;
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $desempeños=desempeño::where('competencia_id',$request->elemento)->get();
        return $desempeños;
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

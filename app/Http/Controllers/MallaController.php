<?php

namespace App\Http\Controllers;

use App\Models\malla;
use App\Models\grado;
use App\Models\unididactica;
use App\Models\area;
use App\Models\componentes;
use App\Models\estandar;
use App\Models\competencia;
use App\Models\desempeño;
use App\Models\indicadorDesempeño;
use Illuminate\Http\Request;

class MallaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades=[];
        $unididacticas = unididactica::all();
        // $componentes=[];
        foreach ($unididacticas as $unididactica) {
            // dd($unididactica->name);
            $grados=grado::where('id',$unididactica->grado_id)->get();
            $area=area::where('id',$unididactica->area_id)->get();
                    
            $data=(object)[
                'id'=>$unididactica->id,
                'unididacticas' => $unididactica->name,
                'grados' => $grados[0]->name,
                'area' => $area[0]->name,
            ];
            array_push($unidades,$data);
        }
        return view('admin.malla.malla', compact('unidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
       
    }

    /**
     * Display the specified resource.
     */
    public function show($malla)
    {
        $unididacticas = unididactica::where('id',$malla)->get();
        $grados=grado::where('id',$unididacticas[0]->grado_id)->get();
        $areas=area::where('id',$unididacticas[0]->area_id)->get();
        $unidad_data=[
            'name'=>$unididacticas[0]->name,
            'componentes'=>[],
        ];

        $componentes=componentes::where('unididactica_id',$unididacticas[0]->id)->get();
            foreach ($componentes as $componente){
                $componente_data=[
                    'id'=>$componente->id,
                    'name'=>$componente->name,
                    'estandares'=>[],
                ];
                $estandares=estandar::where('componente_id',$componente->id)->get();
                foreach ($estandares as $estandar){
                    $estandares_data=[
                        'id'=>$estandar->id,
                        'name'=>$estandar->name,
                        'competencias'=>[],
                    ];
                    $competencias=competencia::where('estandar_id',$estandar->id)->get();
                    foreach($competencias as $competencia){
                        $competencias_data=[
                            'id'=>$competencia->id,
                            'name'=>$competencia->name,
                            'desempeños'=>[],
                        ];
                        $desempeños=desempeño::where('competencia_id',$competencia->id)->get();
                        foreach($desempeños as $desempeño){
                            $desempeños_data=[
                                'id'=>$desempeño->id,
                                'name'=>$desempeño->name,
                                'indicadores'=>[],
                            ];
                            $indicadores=indicadorDesempeño::where('desempeno_id',$desempeño->id)->get();
                            foreach($indicadores as $indicador){
                                $indicadores_data=[
                                    'id'=>$indicador->id,
                                    'name'=>$indicador->name,
                                ];
                                array_push($desempeños_data['indicadores'],$indicadores_data);
                            }
                            array_push($competencias_data['desempeños'],$desempeños_data);
                        }
                        array_push($estandares_data['competencias'],$competencias_data);
                    }
                    array_push($componente_data['estandares'],$estandares_data);
                }
                array_push($unidad_data['componentes'],$componente_data);
            }
                
        return view('admin.malla.verMalla', compact('unidad_data','grados','areas'));
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

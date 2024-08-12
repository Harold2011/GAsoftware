<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\area;
use App\Models\grado;
use App\Models\semana;
use App\Models\gpa;
use App\Models\cronograma;
use App\Models\unididactica;
use App\Models\asignacion;
use App\Models\competencia;
use App\Models\componentes;
use App\Models\desempeño;
use App\Models\estandar;
use App\Models\indicadorDesempeño;
use Illuminate\Support\Facades\Auth;

class ChooseMallaController extends Controller
{

    public function index()
    {
        $mallas=[];
        $usuario=Auth::user();
        $gpas=gpa::where("user_id",$usuario->id)->get();
        foreach($gpas as $gpa){
            $semana=semana::where("id",$gpa->semana_id)->get();
            $cronogramas=cronograma::where("gpa_id",$gpa->id)->get();
            foreach($cronogramas as $cronograma){
                $unidades=unididactica::where("id",$cronograma->unididactica_id)->get();
                foreach($unidades as $unidad){
                    $grado=grado::where("id",$unidad->grado_id)->get();
                    $area=area::where("id",$unidad->area_id)->get();
                    $malla=[
                        'semana'=>$semana[0]->name,
                        'grado'=>$grado[0]->name,
                        'area'=>$area[0]->name,
                        'unidad'=>$unidad->name,
                        'id'=>$cronograma->id,
                    ];
                    
                    array_push($mallas,$malla);
                }
            }
        }
        return view('profesor.malla',compact("mallas"));
    }


    public function create()
    {
        $grados=grado::all();
        $usuario=Auth::user();
        $asignaciones=asignacion::where("profesor_id",$usuario->id)->get();
        $areas_id=[];
        foreach($asignaciones as $asignacion){
            array_push($areas_id,$asignacion->area_id);
        }
        $areas=area::whereIn("id",$areas_id)->get();
        $gpas=gpa::all();
        $gpa_semanas=[];
        foreach($gpas as $gpa){
            array_push($gpa_semanas,$gpa->semana_id);
        }
        $semanas=semana::whereNotIn('id',$gpa_semanas)->get();

        return view('profesor.ElegirMalla',compact('areas','grados','semanas'));
    }

    public function store(Request $request)
    {
        $dataGpa = [
            'grado_id' => $request->grado,
            'semana_id' => $request->semana,
            'area_id' => $request->area,
            'user_id' => $request->usuario,            
        ];

        $gpa=gpa::create($dataGpa);

        $dataCronograma=[
            'unididactica_id'=>$request->unidad,
            'componente_id'=>$request->componente,
            'estandar_id'=>$request->estandar,
            'competencia_id'=>$request->estandar,
            'desempeno_id'=>$request->desempeño,
            'afirmacion_id'=>$request->indicadorDesempeño,
            'gpa_id'=>$gpa->id,
            'estado_id'=>1,
        ];

        cronograma::create($dataCronograma);

    }

    /**
     * Display the specified resource.
     */
    public function show($malla)
    {
        $cronogramas=cronograma::where("id",$malla)->get();
        $unidad=unididactica::where("id",$cronogramas[0]->unididactica_id)->get();
        $componente=componentes::where("id",$cronogramas[0]->componente_id)->get();
        $estandar=estandar::where("id",$cronogramas[0]->estandar_id)->get();
        $competencia=competencia::where("id",$cronogramas[0]->competencia_id)->get();
        $desempeño=desempeño::where("id",$cronogramas[0]->desempeno_id)->get();
        $indicador=indicadorDesempeño::where("id",$cronogramas[0]->afirmacion_id)->get();
        $gpa=gpa::where("id",$cronogramas[0]->gpa_id)->get();
        $grado=grado::where("id",$gpa[0]->grado_id)->get();
        $semana=semana::where("id",$gpa[0]->semana_id)->get();
        $area=area::where("id",$gpa[0]->area_id)->get();
        $mallas=[
            "unidad"=>$unidad[0]->name,
            "componente"=>$componente[0]->name,
            "estandar"=>$estandar[0]->name,
            "competencia"=>$competencia[0]->name,
            "desempeño"=>$desempeño[0]->name,
            "indicador"=>$indicador[0]->name,
            "grado"=>$grado[0]->name,
            "semana"=>$semana[0]->name,
            "area"=>$area[0]->name,
        ];

        return view('profesor.verMalla', compact("mallas"));
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

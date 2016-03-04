<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Input;
class crud extends Controller
{
    public function index(Request $request){
        //$excel = App::make('excel');
        echo print_r($request->all());
        Excel::load($request->file('file'), function ($reader) {

             $reader->each(function($sheet) {    
                 foreach ($sheet->toArray() as $row) {
                    //User::firstOrCreate($row);
                    print_r($row);
                 }
             });
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {

        header("access-control-allow-origin: *");
        $registros = DB::table('info')->get();

        foreach ($registros   as $key => $reg) {
            # code...
            echo '<tr>';
            echo '    <th class="tg-yw4l mono_ano">'.$reg->ano.'</th>';
            echo '    <th class="tg-yw4l mono_codigo">'.$reg->codigo.'</th>';
            echo '    <th class="tg-yw4l mono_sector">'.$reg->sector.'</th>';
            echo '    <th class="tg-yw4l mono_unidad_ejecutora">'.$reg->unidad_ejecutora.'</th>';
            echo '    <th class="tg-yw4l mono_prog">'.$reg->prog.'</th>';
            echo '    <th class="tg-yw4l mono_subp">'.$reg->subp.'</th>';
            echo '    <th class="tg-yw4l mono_proy">'.$reg->proy.'</th>';
            echo '    <th class="tg-yw4l mono_subp2">'.$reg->subp2.'</th>';
            echo '    <th class="tg-yw4l mono_rec">'.$reg->rec.'</th>';
            echo '    <th class="tg-yw4l mono_sit">'.$reg->sit.'</th>';
            echo '    <th class="tg-yw4l mono_nombre">'.$reg->nombre.'</th>';
            echo '    <th class="tg-yw4l mono_apropiacion_inicial">'.$reg->apropiacion_inicial.'</th>';
            echo '    <th class="tg-yw4l mono_apropiacion_vigente">'.$reg->apropiacion_vigente.'</th>';
            echo '    <th class="tg-yw4l mono_compromisos">'.$reg->compromisos.'</th>';
            echo '    <th class="tg-yw4l mono_obligaciones">'.$reg->obligaciones.'</th>';
            echo '    <th class="tg-yw4l mono_pagos">'.$reg->pagos.'</th>';
            echo '    <th class="tg-yw4l mono_fuente">'.$reg->fuente.'</th>';
            echo '    <th class="tg-yw4l mono_fuente" onclick="borrar('.$reg->id.')">BORRAR</th>';
            echo '  </tr>';
        }
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {header('Content-Type: application/json');
    header("access-control-allow-origin: *");
        //
        $campos = array();
        $campos['codigo']=$request->input('codigo');
        $campos['sector']=$request->input('sector');
        $campos['unidad_ejecutora']=$request->input('unidad_ejecutora');
        $campos['prog']=$request->input('prog');
        $campos['subp']=$request->input('subp');
        $campos['proy']=$request->input('proy');
        $campos['subp2']=$request->input('subp2');
        $campos['rec']=$request->input('rec');
        $campos['sit']=$request->input('sit');
        $campos['nombre']=$request->input('nombre');
        $campos['apropiacion_inicial']=$request->input('apropiacion_inicial');
        $campos['apropiacion_vigente']=$request->input('apropiacion_vigente');
        $campos['compromisos']=$request->input('compromisos');
        $campos['obligaciones']=$request->input('obligaciones');
        $campos['pagos']=$request->input('pagos');
        $campos['fuente']=$request->input('fuente');

        $id_insert=DB::table('info')->insertGetId(
           $campos
            );

        $resultado=array('Mensaje'=>"Insertado","Id_inserted"=>$id_insert);
        header('Content-Type: application/json');
        echo json_encode($resultado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {header("access-control-allow-origin: *");
        header('Content-Type: application/json');

        $registros = DB::table('info')->where('id', '=', $id)->get();

        if (count($registros)>0) {
            echo print_r($registros);
            echo json_encode($registros);

        }else{
            $resultado=array('Mensaje'=>"Not found");
            echo json_encode($resultado);

        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {header("access-control-allow-origin: *");
        header('Content-Type: application/json');

        $campos=$request->all();

        
        $update = DB::table('info')->where('id', '=', $id)->update($campos);
        
         $registros = DB::table('info')->where('id', '=', $id)->get();

        if (count($registros)>0) {
            echo print_r($registros);
            echo json_encode($registros);

        }else{
            $resultado=array('Mensaje'=>"Not found");
            echo json_encode($resultado);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {header('Content-Type: application/json');header("access-control-allow-origin: *");
        $update = DB::table('info')->where('id', '=', $id)->delete();
        $resultado=array('Mensaje'=>"Entrada eliminada");
        echo json_encode($resultado);

    }
}

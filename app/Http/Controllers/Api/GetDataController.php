<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Datos;

class GetDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Datos::select('id', 'etiqueta', 'data')->get();
        $rpta = [];
        foreach ($datos as $data) {
            $valor['id'] = $data->id;
            $valor['etiqueta'] = $data->etiqueta;
            $internos = json_decode($data->data);
            $i = 1;
            foreach ($internos as $interno) {
                if ($i <= 200) {
                    $valor['tiempo'] = $interno->tiempo;
                    $valor['x'] = $interno->x;
                    $valor['y'] = $interno->y;
                    $valor['z'] = $interno->z;
                    array_push($rpta, $valor);
                    $i = $i++;
                }
            }
        }
        return $rpta;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\TipoComercial;
use App\Servicio;
use App\Ambiente;
use App\ComodidadEquipamiento;
use App\EspacioComun;
use App\Seguridad;


class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->p == 1) {// paso 1 categorias

            $categorias = Categoria::orderby('nombreCategoria')->get();
			return view ('propiedad.createP1', compact('request', 'categorias'));
    	}

        if ($request->p == 2) {// paso 2 tipo comercial

            //dd($request->categoria);
            $tiposComerciales  =  TipoComercial::orderby('nombreTipoComercial')->get();
			return view ('propiedad.createP2', compact('request'))->with($data);
    	}

        if ($request->p == 3) {// paso 3 confirmar categoria
            //dd($request->categoria);
            $servicios = Servicio::get();
            $comodidades = ComodidadEquipamiento::get();
            $ambientes = Ambiente::get();
            $espaciosComunes = EspacioComun::get();
            $seguridades = Seguridad::get();
			return view ('propiedad.createP3', compact('request','servicios','comodidades'
            ,'ambientes','espaciosComunes','seguridades'));
    	}
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

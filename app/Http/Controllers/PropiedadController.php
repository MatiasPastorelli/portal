<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\TipoComercial;
use App\CaracteristicaCategoria;
use App\Caracteristica;
use App\TipoCaracteristica;


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
			return view ('propiedad.createP2', compact('request','tiposComerciales'));
    	}

        if ($request->p == 3) {// paso 3 confirmar categoria
            //dd($request->categoria);
            $categoria = decrypt($request->categoria);

            $servicios = CaracteristicaCategoria::Join('caracteristicas','caracteristicas_categorias.idCaracteristica','=','caracteristicas.idCaracteristica')
            ->select('caracteristicas.nombreCaracteristica','caracteristicas.idCaracteristica')
            ->where('caracteristicas_categorias.idCategoria',$categoria)
            ->where('caracteristicas_categorias.idTipoComercial',$request->tipoComercial)
            ->where('caracteristicas_categorias.idTipoCaracteristica',1)->get();

            $comodidades = CaracteristicaCategoria::leftJoin('caracteristicas','caracteristicas_categorias.idCaracteristica','=','caracteristicas.idCaracteristica')
            ->select('caracteristicas.nombreCaracteristica','caracteristicas.idCaracteristica')
            ->where('caracteristicas_categorias.idCategoria',$categoria)
            ->where('caracteristicas_categorias.idTipoComercial',$request->tipoComercial)
            ->where('caracteristicas_categorias.idTipoCaracteristica',2)->get();

            $seguridades = CaracteristicaCategoria::leftJoin('caracteristicas','caracteristicas_categorias.idCaracteristica','=','caracteristicas.idCaracteristica')
            ->select('caracteristicas.nombreCaracteristica','caracteristicas.idCaracteristica')
            ->where('caracteristicas_categorias.idCategoria',$categoria)
            ->where('caracteristicas_categorias.idTipoComercial',$request->tipoComercial)
            ->where('caracteristicas_categorias.idTipoCaracteristica',3)->get();

            $ambientes = CaracteristicaCategoria::leftJoin('caracteristicas','caracteristicas_categorias.idCaracteristica','=','caracteristicas.idCaracteristica')
            ->select('caracteristicas.nombreCaracteristica','caracteristicas.idCaracteristica')
            ->where('caracteristicas_categorias.idCategoria',$categoria)
            ->where('caracteristicas_categorias.idTipoComercial',$request->tipoComercial)
            ->where('caracteristicas_categorias.idTipoCaracteristica',4)->get();

            $espaciosComunes = CaracteristicaCategoria::leftJoin('caracteristicas','caracteristicas_categorias.idCaracteristica','=','caracteristicas.idCaracteristica')
            ->select('caracteristicas.nombreCaracteristica','caracteristicas.idCaracteristica')
            ->where('caracteristicas_categorias.idCategoria',$categoria)
            ->where('caracteristicas_categorias.idTipoComercial',$request->tipoComercial)
            ->where('caracteristicas_categorias.idTipoCaracteristica',5)->get();

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

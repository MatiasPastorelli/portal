<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\TipoComercial;
use App\CaracteristicaCategoria;
use App\PropiedadCaracteristica;
use App\Caracteristica;
use App\TipoCaracteristica;
use App\Propiedad;
use Session;
use Validator;
use DB;


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
        $rules = [
            'superficieTotal' => 'required',
            'superficieUtil' => 'required',
            'dormitorios' => 'required',
            'baños' => 'required',
            'estacionamientos' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {

            DB::beginTransaction();
            $categoria = decrypt($request->categoria);

            $nuevaPropiedad = new Propiedad();
            $nuevaPropiedad->fill($request->all());
            $nuevaPropiedad->creador = Session::get('nombreUsuario') . ' ' . Session::get('apellidoUsuario');
            $nuevaPropiedad->save();

            /*foreach para agregar caracteristicas de las propiedades*/
            if(isset($request->servicios))
            {
                foreach ($request->servicios as  $servicio) {
                    $nuevaPropiedadCaracteristica = new PropiedadCaracteristica();
                    $nuevaPropiedadCaracteristica->idCategoria = $categoria;
                    $nuevaPropiedadCaracteristica->idPropiedad = $nuevaPropiedad->idPropiedad;
                    $nuevaPropiedadCaracteristica->idCaracteristica = $servicio;
                    $nuevaPropiedadCaracteristica->idTipoCaracteristica = 1;
                    $nuevaPropiedadCaracteristica->save();
                }
            }
            if(isset($request->comodidadesEquipamientos))
            {
                foreach ($request->comodidadesEquipamientos as  $comodidadEquipamiento) {
                    $nuevaPropiedadCaracteristica = new PropiedadCaracteristica();
                    $nuevaPropiedadCaracteristica->idCategoria = $categoria;
                    $nuevaPropiedadCaracteristica->idPropiedad = $nuevaPropiedad->idPropiedad;
                    $nuevaPropiedadCaracteristica->idCaracteristica = $comodidadEquipamiento;
                    $nuevaPropiedadCaracteristica->idTipoCaracteristica = 2;
                    $nuevaPropiedadCaracteristica->save();
                }
            }
            if(isset($request->ambientes))
            {
                foreach ($request->ambientes as  $ambiente) {
                    $nuevaPropiedadCaracteristica = new PropiedadCaracteristica();
                    $nuevaPropiedadCaracteristica->idCategoria = $categoria;
                    $nuevaPropiedadCaracteristica->idPropiedad = $nuevaPropiedad->idPropiedad;
                    $nuevaPropiedadCaracteristica->idCaracteristica = $ambiente;
                    $nuevaPropiedadCaracteristica->idTipoCaracteristica = 4;
                    $nuevaPropiedadCaracteristica->save();
                }
            }
            if(isset($request->espaciosComunes))
            {
                foreach ($request->espaciosComunes as  $espacioComun) {
                    $nuevaPropiedadCaracteristica = new PropiedadCaracteristica();
                    $nuevaPropiedadCaracteristica->idCategoria = $categoria;
                    $nuevaPropiedadCaracteristica->idPropiedad = $nuevaPropiedad->idPropiedad;
                    $nuevaPropiedadCaracteristica->idCaracteristica = $espacioComun;
                    $nuevaPropiedadCaracteristica->idTipoCaracteristica = 5;
                    $nuevaPropiedadCaracteristica->save();
                }
            }
            if(isset($request->seguridades))
            {
                foreach ($request->seguridades as  $seguridad) {
                    $nuevaPropiedadCaracteristica = new PropiedadCaracteristica();
                    $nuevaPropiedadCaracteristica->idCategoria = $categoria;
                    $nuevaPropiedadCaracteristica->idPropiedad = $nuevaPropiedad->idPropiedad;
                    $nuevaPropiedadCaracteristica->idCaracteristica = $seguridad;
                    $nuevaPropiedadCaracteristica->idTipoCaracteristica = 3;
                    $nuevaPropiedadCaracteristica->save();
                }
            }
            DB::commit();

            toastr()->success('PropiedadCreada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/');
       } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return back();
       }
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

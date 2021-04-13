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
use App\Orientacion;
use App\Plan;
use App\Foto;
use Session;
use Validator;
use DB;
use Image;


class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::where('idUsuario',Session::get('idUsuario'))->paginate(5);
        return view('/propiedad.index', compact('propiedades'));
    }

    public function createImagen(Request $request)
    {
        $propiedad = $request->id;
        $fotos = Foto::where('idPropiedad',$request->id)->get();
        return view('/propiedad.createImagen', compact('fotos','propiedad'));
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


        if ($request->p == 3) {// paso 2 tipo comercial
            //dd($request->categoria);
			return view ('propiedad.createP3', compact('request'));
    	}

        if ($request->p == 4) {// paso 3 confirmar categoria
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

            $orientaciones = Orientacion::get();

            $planes = Plan::get();

			return view ('propiedad.createP4', compact('request','servicios','comodidades'
            ,'ambientes','espaciosComunes','seguridades','orientaciones','plan'));
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
            $nuevaPropiedad->idUsuario = Session::get('idUsuario');
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
            $fotos = Foto::where('idPropiedad', '=', $nuevaPropiedad->idPropiedad)->get();
            $propiedad = $nuevaPropiedad->idPropiedad;
            toastr()->success('Propiedad creada!');
            return redirect('/propiedad');
       } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return back();
       }
    }


    public function subirImagen($id, Request $request) { // sube imagenes de propiedades
		try {
			// obteniendo archivo y path universal para almacenar las imagenes
			$file = $request->file('file');
		    $path = public_path() . '/img/propiedades/';
		    // insertando logo isbast a foto subida de la propiedad
			$img = Image::make($file);
		    $fileName = uniqid() . $file->getClientOriginalName();
		    $img->save($path . $fileName);

		    // guardando ruta donde fue almacenada la imagen de la propiedad en la base de datos
		    $foto = new Foto();
		    $foto->idPropiedad = $id;
		    $foto->linkFoto = $fileName;
		    $foto->save();

		} catch (QueryException $e) {
			toastr()->warning('Error durante la subida de la(s) imagen(es). Revise que los nombres no tengan espacios ni caracteres invalidos');
			return back();
		}
	}


    public function eliminarImagen(Request $request) {
		try {
            if ($request->fileName) {
            	$eliminarFoto = Foto::where('linkFoto', $request->fileName)
                                    ->where('idPropiedad',$request->propiedad)->first();
            	$eliminarFoto->delete();
                File::delete(public_path('img/propiedades/' . $request->fileName));
            } else {
            	toastr()->warning('Debe indicar un nombre de archivo');
            }
		} catch (QueryException $e) {
			toastr()->error('Error de conexion, favor intente nuevamente');
			return back();
		} catch (ModelNotFoundException $e) {
			toastr()->error('Imagen no encontrada');
			return back();
		} catch (Exception $e) {
			toastr()->error('Se ha producido un error, favor intente nuevamente');
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

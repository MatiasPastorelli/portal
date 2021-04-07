<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caracteristica;
use App\TipoCaracteristica;
use App\CaracteristicaCategoria;
use App\TipoComercial;
use App\Categoria;
use Validator;
use DB;



class CaracteristicaCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristicasCategorias = CaracteristicaCategoria::join('caracteristicas as a','caracteristicas_categorias.idCaracteristica','=','a.idCaracteristica')
                                    ->join('tipos_caracteristicas as b','caracteristicas_categorias.idTipoCaracteristica','=','b.idTipoCaracteristica')
                                    ->join('categorias as c','caracteristicas_categorias.idCategoria','=','c.idCategoria')
                                    ->join('tipos_comerciales as d','caracteristicas_categorias.idTipoComercial','=','d.idTipoComercial')
                                    ->select('a.nombreCaracteristica','b.nombreTipoCaracteristica','c.nombreCategoria','d.nombreTipoComercial','caracteristicas_categorias.idCaracteristicaCategoria')
                                    ->orderby('caracteristicas_categorias.idCaracteristicaCategoria')->paginate(7);

        return view('/caracteristicaCategoria.index' , compact('caracteristicasCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposCaracteristicas = TipoCaracteristica::get();
        $tiposComerciales = TipoComercial::get();
        $caracteristicas = Caracteristica::get();
        $categorias = Categoria::get();

        return view('/caracteristicaCategoria.create',compact('tiposCaracteristicas','tiposComerciales','caracteristicas','categorias'));
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
            'idCaracteristica' => 'required',
            'idTipoCaracteristica' => 'required',
            'idCategoria' => 'required',
            'idTipoComercial' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $caracteristicaCategoria = new CaracteristicaCategoria();
            $caracteristicaCategoria->fill($request->all());
            $caracteristicaCategoria->save();

            DB::commit();
            toastr()->success('Caracteristica Categoria creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/caracteristicaCategoria');

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
        $tipoCaracteristica = TipoCaracteristica::where('idTipoCaracteristica',$id);
        $tipoCaracteristica->delete();

        toastr()->success('Tipo Caracteristica Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/tipoCaracteristica');
    }
}

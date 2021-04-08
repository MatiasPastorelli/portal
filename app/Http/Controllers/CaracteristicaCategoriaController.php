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

            foreach ($request->idCaracteristica as $caracteristica) {

                $caracteristicaCategoria = new CaracteristicaCategoria();
                $caracteristicaCategoria->idCaracteristica = $caracteristica;
                $caracteristicaCategoria->idTipoCaracteristica = $request->idTipoCaracteristica;
                $caracteristicaCategoria->idCategoria = $request->idCategoria;
                $caracteristicaCategoria->idTipoComercial = $request->idTipoComercial;
                $caracteristicaCategoria->save();

            }


            DB::commit();
            toastr()->success('Caracteristicas Categorias creadas','Exito!',['positionClass' => 'toast-top-right']);
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
        $caracteristicasCategorias = CaracteristicaCategoria::find($id);
        $tiposCaracteristicas = TipoCaracteristica::get();
        $tiposComerciales = TipoComercial::get();
        $caracteristicas = Caracteristica::get();
        $categorias = Categoria::get();

        return view('/caracteristicaCategoria.edit', compact('tiposCaracteristicas','tiposComerciales','caracteristicas','categorias','caracteristicasCategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            $caracteristicaCategoria = CaracteristicaCategoria::find($request->idCaracteristicaCategoria);
            $caracteristicaCategoria->idCategoria = $request->idCategoria;
            $caracteristicaCategoria->idCaracteristica = $request->idCaracteristica;
            $caracteristicaCategoria->idTipoCaracteristica = $request->idTipoCaracteristica;
            $caracteristicaCategoria->idTipoComercial = $request->idTipoComercial;
            $caracteristicaCategoria->save();

            DB::commit();
            toastr()->success('Caracteristica Categoria Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/caracteristicaCategoria');
        } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return back();
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caracteristicaCategoria = CaracteristicaCategoria::where('idCaracteristicaCategoria',$id);
        $caracteristicaCategoria->delete();

        toastr()->success('Tipo Caracteristica Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/caracteristicaCategoria');
    }
}

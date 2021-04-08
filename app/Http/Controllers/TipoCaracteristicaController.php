<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Caracteristica;
use App\TipoCaracteristica;
use Validator;
use DB;



class TipoCaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoCaracteristicas = TipoCaracteristica::orderby('idTipoCaracteristica')->get();

        return view('/tipoCaracteristica.index' , compact('tipoCaracteristicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/tipoCaracteristica.create');
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
            'nombreTipoCaracteristica' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $tipoCaracteristica = new TipoCaracteristica();
            $tipoCaracteristica->fill($request->all());
            $tipoCaracteristica->save();

            DB::commit();
            toastr()->success('Tipo Caracteristica creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/tipoCaracteristica');

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
        $tiposCaracteristicas = TipoCaracteristica::find($id);
        return view('/tipoCaracteristica.edit', compact('tiposCaracteristicas'));
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
            'nombreTipoCaracteristica' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();
            $tipoCaracteristica = TipoCaracteristica::find($request->idTipoCaracteristica);
            $tipoCaracteristica->nombreTipoCaracteristica = $request->nombreTipoCaracteristica;
            $tipoCaracteristica->save();

            DB::commit();
            toastr()->success('Tipo Caracteristica Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/tipoCaracteristica');

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
        $tipoCaracteristica = TipoCaracteristica::where('idTipoCaracteristica',$id);
        $tipoCaracteristica->delete();

        toastr()->success('Tipo Caracteristica Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/tipoCaracteristica');
    }
}

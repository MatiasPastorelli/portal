<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoComercial;
use Validator;
use DB;



class TipoComercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoComercial = TipoComercial::orderby('idTipoComercial')->get();

        return view('/tipoComercial.index' , compact('tipoComercial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/tipoComercial.create');
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
            'nombreTipoComercial' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $tipoComercial = new TipoComercial();
            $tipoComercial->fill($request->all());
            $tipoComercial->save();

            DB::commit();
            toastr()->success('Tipo Comercial creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/tipoComercial');

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
        $tiposComerciales = TipoComercial::find($id);
        return view('/tipoComercial.edit', compact('tiposComerciales'));
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
            'nombreTipoComercial' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();
            $tipoComercial = TipoComercial::find($request->idTipoComercial);
            $tipoComercial->nombreTipoCaracteristica = $request->nombreTipoComercial;
            $tipoComercial->save();

            DB::commit();
            toastr()->success('Tipo Comercial Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/tipoComercial');
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
        $tipoComercial = TipoComercial::where('idTipoComercial',$id);
        $tipoComercial->delete();

        toastr()->success('Tipo Comercial Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/tipoComercial');
    }
}

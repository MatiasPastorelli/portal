<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orientacion;
use Validator;
use DB;

class OrientacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orientaciones = Orientacion::orderby('idOrientacion')->get();

        return view('/orientacion.index' , compact('orientaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/orientacion.create');
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
            'nombreOrientacion' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $orientacion = new Orientacion();
            $orientacion->fill($request->all());
            $orientacion->save();

            DB::commit();
            toastr()->success('Orientacion creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/orientacion');

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
        $orientaciones = Orientacion::find($id);
        return view('/orientacion.edit', compact('orientaciones'));
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
            'nombreOrientacion' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $orientacion = Orientacion::find($request->idOrientacion);
            $orientacion->nombreOrientacion = $request->nombreOrientacion;
            $orientacion->save();

            DB::commit();
            toastr()->success('Orientacion Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/orientacion');
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
        $orientacion = Orientacion::where('idOrientacion',$id);
        $orientacion->delete();

        toastr()->success('Orientacion Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/orientacion');
    }
}

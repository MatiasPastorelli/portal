<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Moneda;
use Validator;
use DB;


class MonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monedas = Moneda::orderby('idMoneda')->get();

        return view('/moneda.index' , compact('monedas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/moneda.create');
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
            'nombreMoneda' => 'required',
            'tipoCambio' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $moneda = new Moneda();
            $moneda->fill($request->all());
            $moneda->save();

            DB::commit();
            toastr()->success('Moneda creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/moneda');

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
        $monedas = Moneda::find($id);
        return view('/moneda.edit', compact('monedas'));
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
            'nombreMoneda' => 'required',
            'tipoCambio' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $moneda = Moneda::find($request->idMoneda);
            $moneda->nombreMoneda = $request->nombreMoneda;
            $moneda->tipoCambio = $request->tipoCambio;
            $moneda->save();

            DB::commit();
            toastr()->success('Moneda Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/moneda');
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
        $moneda = Moneda::where('idMoneda',$id);
        $moneda->delete();

        toastr()->success('Moneda Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/moneda');
    }
}

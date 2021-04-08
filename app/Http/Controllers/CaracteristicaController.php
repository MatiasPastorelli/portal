<?php

namespace App\Http\Controllers;
use App\Caracteristica;
use App\TipoCaracteristica;
use Illuminate\Http\Request;
use Validator;
use DB;

class CaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristicas = Caracteristica::join('tipos_caracteristicas as tipos','caracteristicas.idTipoCaracteristica','=','tipos.idTipoCaracteristica')
                                         ->orderby('caracteristicas.idCaracteristica')
                                         ->paginate(7);


        return view('/caracteristica.index' , compact('caracteristicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposCaracteristicas = TipoCaracteristica::orderby('nombreTipoCaracteristica')->get();

        return view('/caracteristica.create', compact('tiposCaracteristicas'));
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
            'nombreCaracteristica' => 'required',
            'idTipoCaracteristica' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $caracteristica = new Caracteristica();
            $caracteristica->fill($request->all());
            $caracteristica->save();

            DB::commit();
            toastr()->success('Caracteristica creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/caracteristica');

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
        $caracteristicas = Caracteristica::find($id);
        $tiposCaracteristicas = TipoCaracteristica::get();
        return view('/caracteristica.edit', compact('caracteristicas','tiposCaracteristicas'));
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
            'nombreCaracteristica' => 'required',
            'idTipoCaracteristica' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();
            $caracteristica = Caracteristica::find($request->idCaracteristica);
            $caracteristica->nombreCaracteristica = $request->nombreCaracteristica;
            $caracteristica->idTipoCaracteristica = $request->idTipoCaracteristica;
            $caracteristica->save();

            DB::commit();
            toastr()->success('Caracteristica Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/caracteristica');

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
        $caracteristica = Caracteristica::where('idCaracteristica',$id);
        $caracteristica->delete();

        toastr()->success('Caracteristica Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/caracteristica');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use Validator;
use DB;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertas = Oferta::orderby('idOferta')->get();

        return view('/oferta.index' , compact('ofertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/oferta.create');
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
            'nombreOferta' => 'required',
            'valorOferta' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $oferta = new Oferta();
            $oferta->fill($request->all());
            $oferta->save();

            DB::commit();
            toastr()->success('Oferta creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/oferta');

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
        $ofertas = Oferta::find($id);
        return view('/oferta.edit', compact('ofertas'));
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
            'nombreOferta' => 'required',
            'valorOferta' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $oferta = Oferta::find($request->idOferta);
            $oferta->nombreOferta = $request->nombreOferta;
            $oferta->valorOferta = $request->valorOferta;
            $oferta->save();

            DB::commit();
            toastr()->success('Oferta Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/oferta');
        } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return back();
       }


    }

     public function destroy($id)
        {
            $oferta = Oferta::where('idOferta',$id);
            $oferta->delete();

            toastr()->success('oferta Eliminada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/oferta');
        }
}

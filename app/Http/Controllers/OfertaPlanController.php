<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Oferta;
use App\Plan;
use App\OfertaPlan;
use Validator;
use DB;
use Carbon\Carbon;

class OfertaPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ofertasPlanes = OfertaPlan::join('ofertas as a','ofertas_planes.idOferta','=','a.idOferta')
        ->join('planes as b','ofertas_planes.idPlan','=','b.idPlan')
        ->select('b.nombrePlan','a.nombreOferta','idOfertaPlan')
        ->orderby('idOfertaPlan')->paginate(7);

        return view('/ofertaPlan.index' , compact('ofertasPlanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $planes = Plan::get();
        $ofertas = Oferta::get();

        return view('/ofertaPlan.create',compact('planes','ofertas'));
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
            'idOferta' => 'required',
            'idPlan' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            foreach ($request->idOferta as $oferta) {


                $ofertaPlan = new OfertaPlan();
                $ofertaPlan->idOferta = $oferta;
                $ofertaPlan->idPlan = $request->idPlan;
                $ofertaPlan->save();

            }

            DB::commit();
            toastr()->success('Oferta plan creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/ofertaPlan');

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
        $planes = Plan::get();
        $ofertas = Oferta::get();
        $ofertaPlan = OfertaPlan::find($id);
        return view('/ofertaPlan.edit', compact('ofertaPlan','planes','ofertas'));
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
            'idOferta' => 'required',
            'idPlan' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $ofertaPlan = OfertaPlan::find($request->idOfertaPlan);
            $ofertaPlan->idPlan = $request->idPlan;
            $ofertaPlan->idOferta = $request->idOferta;
            $ofertaPlan->save();

            DB::commit();
            toastr()->success('Oferta Plan Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/ofertaPlan');
        } catch (Exception $e) {
            DB::rollBack();
            toastr()->error($e->getMessage());
            return back();
       }


    }

     public function destroy($id)
        {
            $ofertaPlan = OfertaPlan::where('idOfertaPlan',$id);
            $ofertaPlan->delete();

            toastr()->success('Oferta plan Eliminada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/ofertaPlan');
        }
}

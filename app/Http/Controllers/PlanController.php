<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Validator;
use DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plan::orderby('idPlan')->get();

        return view('/plan.index' , compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/plan.create');
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
            'nombrePlan' => 'required',
            'valorPlan' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $plan = new Plan();
            $plan->fill($request->all());
            $plan->save();

            DB::commit();
            toastr()->success('Plan creada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/plan');

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
        $planes = Plan::find($id);
        return view('/plan.edit', compact('planes'));
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
            'nombrePlan' => 'required',
            'valorPlan' => 'required'];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            //return $errors;
            return back()->with('errors', $errors);
        }

       try {
            DB::beginTransaction();

            $plan = Plan::find($request->idPlan);
            $plan->nombrePlan = $request->nombrePlan;
            $plan->valorPlan = $request->valorPlan;
            $plan->save();

            DB::commit();
            toastr()->success('Plan Actualizada','Exito!',['positionClass' => 'toast-top-right']);
            return redirect('/plan');
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
        $plan = Plan::where('idPlan',$id);
        $plan->delete();

        toastr()->success('Plan Eliminada','Exito!',['positionClass' => 'toast-top-right']);
        return redirect('/plan');
    }
}

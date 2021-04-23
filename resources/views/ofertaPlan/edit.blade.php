@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')
<style>
    #paginador{
        display: table;
        margin-right: auto;
        margin-left: auto;"
    }
</style>
@endsection

@section('content')
@include('common.errors'),



<section class="section-padding pt-10 user-pages-main">
    <div class="container">
       <div class="row">
        @include('layout.presentacion.dashboardAdmin')

          <div class="col-lg-9 col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="subtitulo-isbast text-center">Actualizar oferta plan</h5>
                </div>
                <form action="{{ asset('/ofertaPlanUpdate') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idOfertaPlan" value="{{ $ofertaPlan->idOfertaPlan}}">
                    <div>
                      <div class="card-body m-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>oferta<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idOferta">
                                        @foreach ($ofertas as $oferta)
                                        @if ($oferta->idOferta == $ofertaPlan->idOferta)
                                        <option selected value="{{$oferta->idOferta}}">{{$oferta->nombreOferta}}</option>
                                        @else
                                        <option value="{{$oferta->idOferta}}">{{$oferta->nombreOferta}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Plan<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idPlan">
                                        @foreach ($planes as $plan)
                                        @if ($plan->idPlan == $ofertaPlan->idPlan)
                                        <option selected value="{{$plan->idPlan}}">{{$plan->nombrePlan}}</option>
                                        @else
                                        <option value="{{$plan->idPlan}}">{{$plan->nombrePlan}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                      </div>
                    </div>

                    <div class="my-2 my-lg-0" style="float:right">
                        <ul class="list-inline main-nav-right" >
                            <li class="list-inline-item">
                                <button type="submit" class="btn btn-success btn-sm"" >Confirmar</button>
                           </li>
                           <li class="list-inline-item">
                                <a class="btn btn-link btn-sm" href="/caracteristicaCategoria">Cancelar</a>
                           </li>
                        </ul>
                     </div>
                     <br>
                     <br>
                </form>
            </div>
          </div>
       </div>
    </div>
 </section>


@jquery
@toastr_js
@toastr_render
@endsection

@section('modals')

@endsection

@section('scripts')

@endsection

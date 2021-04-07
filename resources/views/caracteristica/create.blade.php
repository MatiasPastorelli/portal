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
                    <h5 class="subtitulo-isbast text-center">Crear Caracteristica</h5>
                </div>
                <form action="{{ asset('/caracteristicaStore') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                      <div class="card-body m-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nombre Caracteristica<span class="text-danger">*</span></label>
                                    <input type="text" name="nombreCaracteristica" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tipo Caracteristica<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idTipoCaracteristica">
                                        <option value="">Seleccionar</option>
                                        @foreach ($tiposCaracteristicas as $tipo)
                                        <option value="{{$tipo->idTipoCaracteristica}}">{{$tipo->nombreTipoCaracteristica}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                      </div>
                    </div>

                    <div class="my-2 my-lg-0" style="float:right">
                        <ul class="list-inline main-nav-right" >
                           <li class="list-inline-item">
                                <a class="btn btn-link btn-sm" href="/caracteristica">Cancelar</a>
                           </li>
                           <li class="list-inline-item">
                                <button type="submit" class="btn btn-success btn-sm"" >Confirmar</button>
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

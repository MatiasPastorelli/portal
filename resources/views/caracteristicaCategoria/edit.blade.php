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
                    <h5 class="subtitulo-isbast text-center">Actualizar caracteristica categoria {{$caracteristicasCategorias->nombreCaracteristica}}</h5>
                </div>
                <form action="{{ asset('/caracteristicaCategoriaUpdate') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idCaracteristicaCategoria" value="{{ $caracteristicasCategorias->idCaracteristicaCategoria}}">
                    <div>
                      <div class="card-body m-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Caracteristicas<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idCaracteristica">
                                        @foreach ($caracteristicas as $caracteristica)
                                        @if ($caracteristica->idCaracteristica == $caracteristicasCategorias->idCaracteristica)
                                        <option selected value="{{$caracteristica->idCaracteristica}}">{{$caracteristica->nombreCaracteristica}}</option>
                                        @else
                                        <option value="{{$caracteristica->idCaracteristica}}">{{$caracteristica->nombreCaracteristica}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tipo Caracteristica<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idTipoCaracteristica">
                                        @foreach ($tiposCaracteristicas as $tipo)
                                        @if ($caracteristicasCategorias->idTipoCaracteristica == $tipo->idTipoCaracteristica)
                                        <option selected value="{{$tipo->idTipoCaracteristica}}">{{$tipo->nombreTipoCaracteristica}}</option>
                                        @else
                                        <option value="{{$tipo->idTipoCaracteristica}}">{{$tipo->nombreTipoCaracteristica}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Categorias<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idCategoria">
                                        @foreach ($categorias as $categoria)
                                        @if ($caracteristicasCategorias->idCategoria == $categoria->idCategoria)
                                        <option selected value="{{$categoria->idCategoria}}">{{$categoria->nombreCategoria}}</option>
                                        @else
                                        <option value="{{$categoria->idCategoria}}">{{$categoria->nombreCategoria}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tipos Comerciales<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idTipoComercial">
                                        @foreach ($tiposComerciales as $tipo)
                                        @if ($caracteristicasCategorias->idTipoComercial == $tipo->idTipoComercial)
                                        <option selected value="{{$tipo->idTipoComercial}}">{{$tipo->nombreTipoComercial}}</option>
                                        @else
                                        <option value="{{$tipo->idTipoComercial}}">{{$tipo->nombreTipoComercial}}</option>
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

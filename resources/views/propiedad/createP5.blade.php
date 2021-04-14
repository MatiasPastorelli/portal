@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')

<section class="section-padding pt-10 user-pages-main">
    <div class="container">
       <div class="row">
        @include('layout.presentacion.dashboardAdmin')

          <div class="col-lg-9 col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="subtitulo-isbast text-center">Ponle valor a tu propiedad!</h5>
                </div>
                <form action="{{ asset('/propiedadStorePrecio') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="idPropiedad" value="{{ $request->propiedad}}">
                    <div>
                      <div class="card-body m-3">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Precio propiedad<span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="precio" class="form-control" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tipo valor<span class="text-danger">*</span></label>
                                    <select class="form-control custom-select" name="idMoneda">
                                        @foreach ($monedas as $moneda)
                                        <option value="{{$moneda->idMoneda}}">{{$moneda->nombreMoneda}}</option>
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
                                <a class="btn btn-link btn-sm" href="/caracteristica">Cancelar</a>
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



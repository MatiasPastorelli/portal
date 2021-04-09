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
                    <h5 class="subtitulo-isbast text-center">Crear Orientacion</h5>
                </div>
                <form action="{{ asset('/orientacionStore') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                      <div class="card-body m-3">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>Nombre Orientacion<span class="text-danger">*</span></label>
                                    <input type="text" name="nombreOrientacion" class="form-control" >
                                </div>
                            </div>
                      </div>
                    </div>

                    <div class="my-2 my-lg-0" style="float: right">
                        <ul class="list-inline main-nav-right" style="align:Center ">
                            <li class="list-inline-item">
                                <button type="submit" class="btn btn-success btn-sm"" >Confirmar</button>
                           </li>
                           <li class="list-inline-item">
                                <a class="btn btn-link btn-sm" href="/orientacion">Cancelar</a>
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

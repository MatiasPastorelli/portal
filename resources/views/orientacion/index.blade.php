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




<section class="section-padding pt-10 user-pages-main">
    <div class="container">
       <div class="row">


        @include('layout.presentacion.dashboardAdmin')

          <div class="col-lg-9 col-md-9">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-9">
                            <h5 class="subtitulo-isbast text-center">orientacion</h5>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-success" href="{{asset('/orientacionCreate')}}">Agregar</a>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">editar</th>
                                    <th scope="col">eliminar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orientaciones as $orientacion)
                                    <tr>
                                        <td>{{$orientacion->idOrientacion}}</td>
                                        <td>{{$orientacion->nombreOrientacion}}</td>
                                        <td><a  class="btn btn-info" href="/orientacionEdit/{{$orientacion->idOrientacion}}"><span class="mdi mdi-tooltip-edit"></span></a></td>
                                        <td><form action="{{ url('/orientacionDestroy', ['id' => $orientacion->idOrientacion]) }}" method="post">
                                            <button class="btn btn-danger btn-simple btn-xs" type="submit"><span class="mdi mdi-delete"></span> </button>
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

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

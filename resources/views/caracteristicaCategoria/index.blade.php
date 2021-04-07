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
                            <h5 class="subtitulo-isbast text-center">Caracteristicas Categorias</h5>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-success" href="{{asset('/caracteristicaCategoriaCreate')}}">Agregar</a>
                            </div>

                            <table class="table ">
                                <thead>
                                  <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Caracteristica</th>
                                    <th scope="col">Tipo Caracteristica</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Tipo Comercial</th>
                                    <th scope="col">editar</th>
                                    <th scope="col">eliminar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($caracteristicasCategorias as $caracteristica)
                                    <tr>
                                        <td>{{$caracteristica->idCaracteristicaCategoria}}</td>
                                        <td>{{$caracteristica->nombreCaracteristica}}</td>
                                        <td>{{$caracteristica->nombreTipoCaracteristica}}</td>
                                        <td>{{$caracteristica->nombreCategoria}}</td>
                                        <td>{{$caracteristica->nombreTipoComercial}}</td>
                                        <td><a  class="btn btn-info btn-simple btn-xs" href="/caracteristicaCategoriaEdit{$caracteristica->idCaracteristicaCategoria}">Editar</a></td>
                                        <td><form action="{{ url('/caracteristicaCategoriaDestroy', ['id' => $caracteristica->idCaracteristicaCategoria]) }}" method="post">
                                            <input class="btn btn-danger btn-simple btn-xs" type="submit" value="Eliminar" />
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="paginador">{{ $caracteristicasCategorias->links()}}</div>
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

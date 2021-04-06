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
                    <h5 class="subtitulo-isbast text-center">Caracteristicas</h5>
                </div>

                <div class="card-body m-3">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tipo Caracteristica</th>
                            <th scope="col">editar</th>
                            <th scope="col">eliminar</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($caracteristicas as $caracteristica)
                            <tr>
                                <td></td>
                                <td>{{$caracteristica->nombreCaracteristica}}</td>
                                <td>{{$caracteristica->nombreTipoCaracteristica}}</td>
                                <td><a  class="btn btn-info btn-simple btn-xs" href="/caracteristicaEdit{$caracteristica->idCaracteristica}">Editar</a></td>
                                <td><form action="{{ url('/caracteristicaDestroy', ['id' => $caracteristica->idCaracteristica]) }}" method="post">
                                    <input class="btn btn-danger btn-simple btn-xs" type="submit" value="Eliminar" />
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
 </section>


@jquery
@toastr_js
@toastr_render
@endsection

@section('modals')

@endsection

@section('scripts')

@endsection

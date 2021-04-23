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
                            <h5 class="subtitulo-isbast text-center">Ofertas Planes</h5>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-success" href="{{asset('/ofertaPlanCreate')}}">Agregar</a>
                            </div>

                            <table class="table ">
                                <thead>
                                  <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col">Oferta</th>
                                    <th scope="col">editar</th>
                                    <th scope="col">eliminar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ofertasPlanes as $ofertaPlan)
                                    <tr>
                                        <td>{{$ofertaPlan->idOfertaPlan}}</td>
                                        <td>{{$ofertaPlan->nombrePlan}}</td>
                                        <td>{{$ofertaPlan->nombreOferta}}</td>
                                        <td><a  class="btn btn-info btn-simple btn-xs" href="/ofertaPlanEdit/{{$ofertaPlan->idOfertaPlan}}">Editar</a></td>
                                        <td><form action="{{ url('/ofertaPlanDestroy', ['id' => $ofertaPlan->idOfertaPlan]) }}" method="post">
                                            <input class="btn btn-danger btn-simple btn-xs" type="submit" value="Eliminar" />
                                            <input type="hidden" name="_method" value="delete" />
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="paginador">{{ $ofertasPlanes->links()}}</div>
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

@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')

<section class="section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-12 col-md-12">
             @foreach ($planes as $plan)
             <form action="{{ asset('/propiedadStorePlan') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="idPropiedad" value="{{ $propiedad}}">
                <input type="hidden" name="idPlan" value="{{$plan->idPlan}}">
                <input type="hidden" name="valorPlan" value="{{$plan->valorPlan}}">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    <div class="card blog-card">
                        <a href="#">

                            <div class="card-body">
                                <span class="badge badge-success">{{$plan->nombrePlan}}</span>
                                <h6>Poner algo aqui</h6>
                                <p class="mb-0">valor : {{$plan->valorPlan}}</p>
                            </div>
                            <div class="card-footer">
                                <div class="my-2 my-lg-0" style="float:right">
                                    <ul class="list-inline main-nav-right" >
                                        <li class="list-inline-item">
                                            <button type="submit" class="btn btn-success btn-sm"" >Confirmar</button>
                                       </li>
                                    </ul>
                                 </div>
                                 <br>
                            </div>
                        </a>
                    </div>
                    </div>
                </div>
            </form>
             @endforeach
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



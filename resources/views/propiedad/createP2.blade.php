@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')

<section class="section-padding">
    <div class="section-title text-center mb-5">
       <h2>Empieza describiendo el inmueble</h2>
    </div>
    <div class="container">
        <div class="row">
			<div class="col-lg-12 simulador-container">
				<div class="card">
					<div class="card-header">
						<h5 class="subtitulo-isbast text-center">Elige el inmueble que quieres publicar</h5>
					</div>

                    <input class="form-control" type="hidden" name="idPropiedad" value="{{ $request->idCategoria }}">


					<div class="card-body m-3">
						@foreach ($tiposComerciales as $tipo)
							<a class="btn btn-outline-success btn-block" href="/propiedadCreate?categoria={{ $request->categoria }}&tipoComercial={{$tipo->idTipoComercial}}&p=3">{{ $tipo->nombreTipoComercial }}</a>
						@endforeach
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



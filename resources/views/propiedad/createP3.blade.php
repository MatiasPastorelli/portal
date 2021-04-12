
@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')
<br>
<section id="confirmarCategoria">
    <div class="container">
        <div class="row">
			<div class="col-lg-12 simulador-container">
				<div class="card">
					<div class="card-header">
						<h5 class="subtitulo-isbast text-center">Elige el inmueble que quieres publicar</h5>
					</div>

					<div class="card-body m-2">
                        <h6>Confirma la categoría que elegiste</h6>
                        <p>Una vez que publiques, no podrás cambiar los datos que acabas de completar.</p>

                        <div class="my-2 my-lg-0" style="float: right">
                            <ul class="list-inline main-nav-right" style="align:Center ">
                               <li class="list-inline-item">
                                <a class="btn btn-link btn-sm" href="/propiedadCreate?p=1">Cambiar categoria</a>
                               </li>
                               <li class="list-inline-item">
                                <a class="btn btn-success btn-block" href="/propiedadCreate?categoria={{ $request->categoria }}&tipoComercial={{$request->tipoComercial}}&p=4">Confirmar</a>
                               </li>
                            </ul>
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



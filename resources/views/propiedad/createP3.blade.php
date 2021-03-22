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

					<div class="card-body m-3">
                        <h6>Confirma la categoría que elegiste</h6>
                        <p>Una vez que publiques, no podrás cambiar los datos que acabas de completar.</p>

                        <div class="my-2 my-lg-0" style="float: right" id="confirmacionCategoria">
                            <ul class="list-inline main-nav-right" style="align:Center ">
                               <li class="list-inline-item">
                                <a class="btn btn-link btn-sm" href="/propiedadCreate?p=1">Cambiar categoria</a>
                               </li>
                               <li class="list-inline-item">
                                  <a class="btn btn-success btn-sm" onclick="confirmarCategoria();" >Confirmar</a>
                               </li>
                            </ul>
                         </div>
					</div>
				</div>
			</div>
		</div>
    </div>
 </section>

 <section id="parte3">

hola funciona

 </section>



@jquery
@toastr_js
@toastr_render
@endsection

@section('modals')

@endsection

@section('scripts')
<script>
    $('#parte3').hide();
    function confirmarCategoria() {
        $('#confirmacionCategoria').hide();
        $('#parte3').show();
    }


</script>


@endsection


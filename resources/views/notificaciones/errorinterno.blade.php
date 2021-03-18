@extends('layouts.login2.app')

@section('title', 'isbast - Cuenta no encontrada')

@section('css')
@endsection

@section('content')
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="/img/login.jpg" alt="">
						<div class="hover">
							<h4><strong>¡No pierdas la oportunidad de ser parte del gigante que está cambiando el mundo del corretaje!</strong></h4>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h4>Error</h4>
						<p>Hemos detectado un error! Favor intenta nuevamente</p>

						<div class="col-md-12 form-group">
							<p><a href="/">Volver al inicio</a></p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')

@endsection
@extends('layout.presentacion.appsimple')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')
   <section class="hv-100">
      <div class="container hv-100">
         <div class="row align-items-center hv-100">
            <div class="col-lg-4 col-md-4 mx-auto">
               <div class="card padding-card mb-0">
                  <div class="card-body">
                     <h5 class="card-title mb-4">Hola! Ingresa tus datos de acceso</h5>
                     <form action="{{ asset('/validarLoginUsuario') }}" method="POST">
                        @csrf
                        <div class="form-group">
                           <label>E-mail <span class="text-danger">*</span></label>
                           <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                        </div>
                        <div class="form-group">
                           <label>Password <span class="text-danger">*</span></label>
                           <input type="password" class="form-control" required placeholder="Password" id="password" name="password">
                        </div>
                        <div class="form-group">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="checkRecuerdame" name="checkRecuerdame">
                              <label class="custom-control-label" for="checkRecuerdame">Recuérdame en este equipo</label>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Ingresar</button>
                     </form>
                     <div class="mt-4 text-center">
                        ¿No tienes cuenta? <a href="{{ url('/registrar') }}">Regístrate</a>
                     </div>
                   <!--  <div class="mt-4 text-center login-with-social">

                        <button type="button" class="btn btn-facebook btn-block"><i class="mdi mdi-facebook"></i> Login With Facebook</button>
                        <button type="button" class="btn btn-twitter btn-block"><i class="mdi mdi-twitter"></i> Login With Twitter</button>
                        <button type="button" class="btn btn-google btn-block"><i class="mdi mdi-google-plus"></i> Login With Google</button>
                     </div>-->
                     <div class="mt-4 text-center">
                        <a href="forget.html">Olvidaste tu password?</a>
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

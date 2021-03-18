@extends('layout.presentacion.appsimple')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')
   <!-- Register -->
   <section class="hv-100">
      <div class="container">
         <div class="row align-items-center hv-100">
            <div class="col-lg-5 col-md-5 mx-auto">
               <div class="card padding-card mb-0">
                  <div class="card-body">
                     <h5 class="card-title mb-4">Completa tus datos</h5>
                     <form action="{{ asset('/storeRegistrarUsuario') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                           <label>Nombre <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                           <label>Apellido <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" placeholder="Apellido" id="apellido" name="apellido">
                        </div>
                        <div class="form-group">
                           <label>Rut <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" placeholder="Rut" id="rut" name="rut">
                        </div>
                        <div class="form-group">
                           <label>E-mail <span class="text-danger">*</span></label>
                           <input type="email" class="form-control" placeholder="E-mail" id="email" name="email">
                        </div>
                        <div class="form-group">
                           <label>Password <span class="text-danger">*</span></label>
                           <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>
                        <div class="form-group">
                           <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="checktc" name="checktc">
                              <label class="custom-control-label" for="checktc">Acepto los <a href="{{asset('/terminos')}}" target="_blank" style="color: #3483fa;">Términos y Condiciones</a> y autorizo el uso de mis datos de acuerdo a la <a href="{{asset('/declaracionPrivacidad')}}" target="_blank" style="color: #3483fa;">Declaracion de Privacidad</a></label>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Crear cuenta</button>
                     </form>
                     <div class="mt-4 text-center">
                        ¿Ya tienes cuenta? - <a href="{{ asset('/login') }}">Login</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Register -->
    @jquery
    @toastr_js
    @toastr_render
@endsection

@section('modals')

@endsection

@section('scripts')

@endsection

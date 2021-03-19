@extends('layout.presentacion.appsimple')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')
   <!-- Register -->
   <section class="hv-50">
      <div class="container">
         <div class="row align-items-center hv-50">
            <div class="col-lg-5 col-md-5 mx-auto">
               <div class="card padding-card mb-0">
                  <div class="card-body">
                     <h5 class="card-title mb-4">Completa tus datos</h5>
                     <form action="{{asset('reestablecer-password')}}" method="POST">
                        @csrf
                        <input type="hidden" name="t" value="{{$usuario->tokenCorto}}">

                        <div class="form-group">
                           <label>Password <span class="text-danger">*</span></label>
                           <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label>Repite Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" placeholder="Password2" id="password2" name="password2">
                         </div>

                        <button type="submit" class="btn btn-success btn-block">Reestablecer</button>
                     </form>
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

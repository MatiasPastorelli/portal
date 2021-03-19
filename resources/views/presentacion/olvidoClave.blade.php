@extends('layout.presentacion.appsimple')
@section('title', 'Caza - Caza tu casa')


@section('meta')

@endsection

@section('css')

@endsection

@section('content')
@include('common.errors')
<section class="hv-100">
    <div class="container">
       <div class="row align-items-center hv-100">
          <div class="col-lg-4 col-md-4 mx-auto">
             <div class="card padding-card mb-0">
                <div class="card-body">
                   <h5 class="card-title mb-4">Recuperar cuenta</h5>
                   <form action="{{asset('/olvidoClave')}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                         <label>Email<span class="text-danger">*</span></label>
                         <input type="email" name="email" id="email" class="form-control" placeholder="Your Email or Username">
                      </div>
                      <button type="submit" class="btn btn-success btn-block">RESET PASSWORD</button>
                   </form>
                   <div class="mt-4 text-center">
                    ¿ No posees cuenta ? <a href="{{asset('/registrar')}}">Register</a>
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

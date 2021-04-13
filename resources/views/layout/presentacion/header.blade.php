<header>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
         <a class="navbar-brand text-success logo" href="{{asset('/')}}">
         <img class="img-fluid" src="img/logo.svg" alt="">
         </a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                  Ayuda
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                     <a class="dropdown-item" href="blog.html">Blog</a>
                     <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                  </div>
                </li>
               @if (Session::has('idUsuario'))
                <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                     {{ Session::get('nombreUsuario') }}
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="{{asset('/propiedad')}}">Propiedades</a>
                        <a class="dropdown-item" href="social-profiles.html">Historias</a>
                        <a class="dropdown-item" href="my-properties.html">Planes para profesionales</a>
                        <a class="dropdown-item" href="{{ asset('/cerrarSesion') }}">Salir</a>
                     </div>
                </li>
               @endif
               @if (Session::has('idUsuario'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                    <a class="dropdown-item" href="{{asset('/caracteristica')}}">Caracteristicas</a>
                    <a class="dropdown-item" href="{{asset('/tipoCaracteristica')}}">Tipos Caracteristicas</a>
                    <a class="dropdown-item" href="{{asset('/tipoComercial')}}">Tipos comerciales</a>
                    <a class="dropdown-item" href="{{asset('/caracteristicaCategoria')}}">Caracteristicas Categorias</a>
                    <a class="dropdown-item" href="{{asset('/moneda')}}">Monedas</a>
                    <a class="dropdown-item" href="{{asset('/plan')}}">Planes</a>
                    <a class="dropdown-item" href="{{asset('/plan')}}">Orientaciones</a>
                    </div>
                </li>
                @endif
            </ul>

            @if (!Session::has('idUsuario'))
               <div class="my-2 my-lg-0">
                  <ul class="list-inline main-nav-right">
                     <li class="list-inline-item">
                        <a class="btn btn-link btn-sm" href="{{ asset('/login') }}">Ingresa</a>
                     </li>
                  </ul>
               </div>
            @endif
                <div class="my-2 my-lg-0">
                  <ul class="list-inline main-nav-right">
                     <li class="list-inline-item">
                        @if (Session::has('idUsuario'))
                        <a class="btn btn-success btn-sm" href="/propiedadCreate?p=1">Publica tu Propiedad</a>
                        @endif
                        @if (!Session::has('idUsuario'))
                        <a class="btn btn-success btn-sm" href="{{ asset('/login') }}">Publica tu Propiedad</a>
                        @endif
                     </li>
                  </ul>
                </div>
         </div>
      </div>
   </nav>
</header>

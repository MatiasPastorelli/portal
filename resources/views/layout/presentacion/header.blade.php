<header>
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
         <a class="navbar-brand text-success logo" href="index.html">
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
                  Properties
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                     <a class="dropdown-item" href="properties-grid.html">Properties Grid</a>
                     <a class="dropdown-item" href="properties-list.html">Properties List</a>
                     <a class="dropdown-item" href="property-single-slider.html">Property Single Slider</a>
                     <a class="dropdown-item" href="property-single-gallery.html">Property Single Gallery</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                  Agency
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                     <a class="dropdown-item" href="agency-list.html">Agency List</a>
                     <a class="dropdown-item" href="agency-profile.html">Agency Profile</a>
                     <a class="dropdown-item" href="agents.html">Agents</a>
                     <a class="dropdown-item" href="agent-profile.html">Agent Profile</a>
                  </div>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false">
                  Blog
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
                     {{ Session::get('nombre') }}
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdownPortfolio">
                        <a class="dropdown-item" href="user-profile.html">Mi cuenta</a>
                        <a class="dropdown-item" href="social-profiles.html">Mis cotizaciones</a>
                        <a class="dropdown-item" href="my-properties.html">Historial</a>
                        <a class="dropdown-item" href="favorite-properties.html">Planes para profesionales</a>
                        <a class="dropdown-item" href="add-property.html">Salir</a>
                     </div>
                  </li>
               @endif
            </ul>
            <div class="my-2 my-lg-0">
               <ul class="list-inline main-nav-right">
                  <li class="list-inline-item">
                     <a class="btn btn-link btn-sm" href="{{ asset('/login') }}">Login</a>
                  </li>
                  <li class="list-inline-item">
                     <a class="btn btn-success btn-sm" href="{{ asset('/registrar') }}">Registrar</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
</header>
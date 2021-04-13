 @extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')


<section class="section-padding">
    <div class="container">
       <div class="row">
          <div class="col-lg-4 col-md-4">
             <div class="card sidebar-card">
                <div class="card-body">
                   <h5 class="card-title mb-3">Property Type</h5>
                   <ul class="sidebar-card-list">
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> House/Villa <span class="sidebar-badge">90</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Flat <span class="sidebar-badge">60</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Plot/Land <span class="sidebar-badge">44</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Office Space <span class="sidebar-badge">38</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Shop/Showroom <span class="sidebar-badge">29</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Commercial Land <span class="sidebar-badge">28</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Warehouse/ Godown <span class="sidebar-badge">12</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Industrial Building <span class="sidebar-badge">8</span></a></li>
                   </ul>
                </div>
             </div>
             <div class="card sidebar-card">
                <div class="card-body">
                   <h5 class="card-title mb-3">Property Status</h5>
                   <ul class="sidebar-card-list">
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> For Rent <span class="sidebar-badge">600</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> For Sale <span class="sidebar-badge">1200</span></a></li>
                   </ul>
                </div>
             </div>
             <div class="card sidebar-card">
                <div class="card-body">
                   <h5 class="card-title mb-3">Property By City</h5>
                   <ul class="sidebar-card-list">
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> New York <span class="sidebar-badge">220</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Los Angeles <span class="sidebar-badge">150</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Chicago <span class="sidebar-badge">100</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Houston <span class="sidebar-badge">50</span></a></li>
                      <li><a href="#"><i class="mdi mdi-chevron-right"></i> Philadelphia <span class="sidebar-badge">23</span></a></li>
                   </ul>
                </div>
             </div>
             <div class="card sidebar-card">
                <div class="card-body">
                   <h5 class="card-title mb-4">Featured Properties</h5>
                   <div id="featured-properties" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                         <li data-target="#featured-properties" data-slide-to="0" class="active"></li>
                         <li data-target="#featured-properties" data-slide-to="1"></li>
                      </ol>
                      <div class="carousel-inner">
                         <div class="carousel-item active">
                            <div class="card card-list">
                               <a href="#">
                                  <span class="badge badge-success">For Sale</span>
                                  <img class="card-img-top" src="img/list/1.png" alt="Card image cap">
                                  <div class="card-body">
                                     <h5 class="card-title">House in Kent Street</h5>
                                     <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> 127 Kent Sreet, Sydny, NEW 2000</h6>
                                     <h2 class="text-success mb-0 mt-3">
                                        $130,000 <small>/month</small>
                                     </h2>
                                  </div>
                               </a>
                            </div>
                         </div>
                         <div class="carousel-item">
                            <div class="card card-list">
                               <a href="#">
                                  <span class="badge badge-secondary">For Rent</span>
                                  <img class="card-img-top" src="img/list/2.png" alt="Card image cap">
                                  <div class="card-body">
                                     <h5 class="card-title">Family House in Hudson</h5>
                                     <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> Hoboken, NJ, USA</h6>
                                     <h2 class="text-success mb-0 mt-3">
                                        $127,000 <small>/month</small>
                                     </h2>
                                  </div>
                               </a>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-8 col-md-8">
             <div class="site_top_filter row">
                <div class="col-lg-6 col-md-6 tags-action">
                   <span>For Rent <a href="#"><i class="mdi mdi-window-close"></i></a></span>
                   <span>Plot/Land <a href="#"><i class="mdi mdi-window-close"></i></a></span>
                </div>
                <div class="col-lg-6 col-md-6 sort-by-btn float-right">
                   <div class="view-mode float-right">
                      <a href="properties-grid.html"><i class="mdi mdi-grid"></i></a><a class="active" href="properties-list.html"><i class="mdi mdi-format-list-bulleted"></i></a>
                   </div>
                   <div class="dropdown float-right">
                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="mdi mdi-filter"></i> Sort by
                      </button>
                      <div class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton">
                         <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Popularity </a>
                         <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> New </a>
                         <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Discount </a>
                         <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Price: Low to High </a>
                         <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Price: High to Low </a>
                      </div>
                   </div>
                </div>
             </div>
             <div class="row">
                @foreach ($propiedades as $propiedad)
                <div class="col-lg-12 col-md-12">
                    <div class="card card-list card-list-view">
                       <a href="#">
                          <div class="row no-gutters">
                             <div class="col-lg-5 col-md-5">
                                <a class="badge badge-success" href="/createImagen?id={{$propiedad->idPropiedad}}">Editar Fotos</a>
                                <img class="card-img-top" src="img/list/1.png" alt="Card image cap">
                             </div>
                             <div class="col-lg-7 col-md-7">
                                <div class="card-body">
                                   <h5 class="card-title">{{$propiedad->direccion}}</h5>
                                   <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> 127 Kent Sreet, Sydny, NEW 2000</h6>
                                   <h2 class="text-success mb-0 mt-3">
                                     ${{$propiedad->precio}} <small>/month</small>
                                   </h2>
                                </div>
                                <div class="card-footer">
                                   <span><i class="mdi mdi-sofa"></i> Baños : <strong>{{$propiedad->baños}}</strong></span>
                                   <span><i class="mdi mdi-scale-bathroom"></i> Dormitorios : <strong>{{$propiedad->dormitorios}}</strong></span>
                                   <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>{{$propiedad->superficieTotal}} cm2</strong></span>
                                </div>
                             </div>
                          </div>
                       </a>
                    </div>
                 </div>
                @endforeach

                 <div id="paginador">{{ $propiedades->links()}}</div>
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

@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

@endsection

@section('content')
<!-- Main Slider With Form -->
      <section class="site-slider">
         <div id="siteslider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
               <li data-target="#siteslider" data-slide-to="1" class="active"></li>
               <li data-target="#siteslider" data-slide-to="2"></li>
               <li data-target="#siteslider" data-slide-to="3"></li>
               <li data-target="#siteslider" data-slide-to="4"></li>
               <li data-target="#siteslider" data-slide-to="5"></li>
               <li data-target="#siteslider" data-slide-to="6"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                        <a href="imagen1.html" target="_blank">
                            <img   src="img/carousel/1.png" alt="1">
                        </a>
                </div>
                <div class="carousel-item">
                        <a href="imagen2.html" target="_blank">
                            <img class="d-block w-100" src="img/carousel/2.png" alt="2">
                        </a>
                </div>
                <div class="carousel-item">
                    <a href="imagen3.html" target="_blank">
                        <img class="d-block w-100" src="img/carousel/3.png" alt="3">
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="imagen4.html" target="_blank">
                        <img class="d-block w-100" src="img/carousel/4.png" alt="4">
                    </a>
                </div>
                <div class="carousel-item">
                        <a href="imagen5.html" target="_blank">
                            <img class="d-block w-100" src="img/carousel/5.png" alt="5">
                        </a>
                </div>
                <div class="carousel-item">
                        <a href="imagen6.html" target="_blank">
                            <img class="d-block w-100" src="img/carousel/6.jpg" alt="6">
                        </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#siteslider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#siteslider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
         <!--<div class="slider-form">
            <div class="container">
               <div class="text-center mb-5">
                  <h6 class="subtitle mb-1 mt-0 text-shadow text-dark">Uncover the best offers on the real estate
                     market.
                  </h6>
                  <h1 class="display-4 mt-0 font-weight-bold text-shadow">Let us guide you home
                  </h1>
               </div>
               <form>
                  <div class="row no-gutters">
                     <div class="col-md-4">
                        <div class="input-group">
                           <div class="input-group-addon"><i class="mdi mdi-map-marker-multiple"></i></div>
                           <input class="form-control" placeholder="Enter Location, Project or Landmark" type="text">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="input-group">
                           <div class="input-group-addon"><i class="mdi mdi-google-maps"></i></div>
                           <select class="form-control select2 no-radius">
                              <option value="">Locations</option>
                              <option value="AL">Alabama</option>
                              <option value="AK">Alaska</option>
                              <option value="AZ">Arizona</option>
                              <option value="AR">Arkansas</option>
                              <option value="CA">California</option>
                              <option value="CO">Colorado</option>
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                              <option value="DC">District Of Columbia</option>
                              <option value="FL">Florida</option>
                              <option value="GA">Georgia</option>
                              <option value="HI">Hawaii</option>
                              <option value="ID">Idaho</option>
                              <option value="IL">Illinois</option>
                              <option value="IN">Indiana</option>
                              <option value="IA">Iowa</option>
                              <option value="KS">Kansas</option>
                              <option value="KY">Kentucky</option>
                              <option value="LA">Louisiana</option>
                              <option value="ME">Maine</option>
                              <option value="MD">Maryland</option>
                              <option value="MA">Massachusetts</option>
                              <option value="MI">Michigan</option>
                              <option value="MN">Minnesota</option>
                              <option value="MS">Mississippi</option>
                              <option value="MO">Missouri</option>
                              <option value="MT">Montana</option>
                              <option value="NE">Nebraska</option>
                              <option value="NV">Nevada</option>
                              <option value="NH">New Hampshire</option>
                              <option value="NJ">New Jersey</option>
                              <option value="NM">New Mexico</option>
                              <option value="NY">New York</option>
                              <option value="NC">North Carolina</option>
                              <option value="ND">North Dakota</option>
                              <option value="OH">Ohio</option>
                              <option value="OK">Oklahoma</option>
                              <option value="OR">Oregon</option>
                              <option value="PA">Pennsylvania</option>
                              <option value="RI">Rhode Island</option>
                              <option value="SC">South Carolina</option>
                              <option value="SD">South Dakota</option>
                              <option value="TN">Tennessee</option>
                              <option value="TX">Texas</option>
                              <option value="UT">Utah</option>
                              <option value="VT">Vermont</option>
                              <option value="VA">Virginia</option>
                              <option value="WA">Washington</option>
                              <option value="WV">West Virginia</option>
                              <option value="WI">Wisconsin</option>
                              <option value="WY">Wyoming</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="input-group">
                           <div class="input-group-addon"><i class="mdi mdi-security-home"></i></div>
                           <select class="form-control select2 no-radius">
                              <option value="">Property Type</option>
                              <option value="">House/Villa</option>
                              <option value="">Flat</option>
                              <option value="">Plot/Land</option>
                              <option value="">Office Space</option>
                              <option value="">Shop/Showroom</option>
                              <option value="">Commercial Land</option>
                              <option value="">Warehouse/ Godown</option>
                              <option value="">Industrial Building</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-2">
                        <button type="submit" class="btn btn-success btn-block no-radius font-weight-bold">SEARCH</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
        -->
      </section>
      <!-- End Main Slider With Form -->
      <!-- Properties by City -->
      <section class="section-padding bg-white">
         <div class="section-title text-center mb-5">
            <h2>Property By City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  <div class="card bg-dark text-white card-overlay">
                     <a href="#">
                        <img class="card-img" src="img/overlay/1.png" alt="Card image">
                        <div class="card-img-overlay">
                           <h3 class="card-title text-white">New York</h3>
                           <p class="card-text text-white">16 Properties</p>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="card bg-dark text-white card-overlay">
                     <a href="#">
                        <img class="card-img" src="img/overlay/2.png" alt="Card image">
                        <div class="card-img-overlay">
                           <h3 class="card-title text-white">Los Angeles</h3>
                           <p class="card-text text-white">265 Properties</p>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="card bg-dark text-white card-overlay">
                     <a href="#">
                        <img class="card-img" src="img/overlay/3.png" alt="Card image">
                        <div class="card-img-overlay">
                           <h3 class="card-title text-white">Chicago</h3>
                           <p class="card-text text-white">620 Properties</p>
                        </div>
                     </a>
                     .
                  </div>
               </div>
               <div class="col-lg-3">
                  <div class="card bg-dark text-white card-overlay">
                     <a href="#">
                        <img class="card-img" src="img/overlay/4.png" alt="Card image">
                        <div class="card-img-overlay">
                           <h3 class="card-title text-white">Philadelphia</h3>
                           <p class="card-text text-white">28 Properties</p>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Properties by City -->
      <!-- Properties List -->
      <section class="section-padding">
         <div class="section-title text-center mb-5">
            <h2>Latest Properties</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="card card-list">
                     <a href="#">
                        <span class="badge badge-success">For Sale</span>
                        <img class="card-img-top" src="img/list/1.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">House in Kent Street</h5>
                           <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> 127 Kent
                              Sreet, Sydny, NEW 2000
                           </h6>
                           <div class="review-block-rate">
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <span class="badge-pill badge-success ml-2">3.2</span>
                           </div>
                           <h2 class="text-success mb-0 mt-3">
                              $130,000 <small>/month</small>
                           </h2>
                        </div>
                        <div class="card-footer">
                           <span><i class="mdi mdi-sofa"></i> Beds : <strong>3</strong></span>
                           <span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>2</strong></span>
                           <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>587 sq ft</strong></span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="card card-list">
                     <a href="#">
                        <span class="badge badge-secondary">For Rent</span>
                        <img class="card-img-top" src="img/list/2.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Family House in Hudson</h5>
                           <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> Hoboken, NJ,
                              USA
                           </h6>
                           <div class="review-block-rate">
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <span class="badge-pill badge-success ml-2">3.2</span>
                           </div>
                           <h2 class="text-success mb-0 mt-3">
                              $127,000 <small>/month</small>
                           </h2>
                        </div>
                        <div class="card-footer">
                           <span><i class="mdi mdi-sofa"></i> Beds : <strong>5</strong></span>
                           <span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>3</strong></span>
                           <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>300 sq ft</strong></span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="card card-list">
                     <a href="#">
                        <span class="badge badge-success">For Sale</span>
                        <img class="card-img-top" src="img/list/3.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Loft Above The City</h5>
                           <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> Hope Street
                              (Stop P), London SW11, UK
                           </h6>
                           <div class="review-block-rate">
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <span class="badge-pill badge-success ml-2">3.2</span>
                           </div>
                           <h2 class="text-success mb-0 mt-3">
                              $55,000 <small>/month</small>
                           </h2>
                        </div>
                        <div class="card-footer">
                           <span><i class="mdi mdi-sofa"></i> Beds : <strong>2</strong></span>
                           <span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>1</strong></span>
                           <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>100 sq ft</strong></span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="card card-list">
                     <a href="#">
                        <span class="badge badge-danger">For Sale</span>
                        <img class="card-img-top" src="img/list/4.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Store Space Greenville</h5>
                           <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> 250-260 3rd
                              St, Hoboken, NJ 07030, USA
                           </h6>
                           <div class="review-block-rate">
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <span class="badge-pill badge-success ml-2">3.2</span>
                           </div>
                           <h2 class="text-success mb-0 mt-3">
                              $25,000 <small>/month</small>
                           </h2>
                        </div>
                        <div class="card-footer">
                           <span><i class="mdi mdi-sofa"></i> Beds : <strong>6</strong></span>
                           <span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>4</strong></span>
                           <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>987 sq ft</strong></span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="card card-list">
                     <a href="#">
                        <span class="badge badge-warning">For Rent</span>
                        <img class="card-img-top" src="img/list/5.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Villa in Melbourne</h5>
                           <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> NJ 07305, USA
                           </h6>
                           <div class="review-block-rate">
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <span class="badge-pill badge-success ml-2">3.2</span>
                           </div>
                           <h2 class="text-success mb-0 mt-3">
                              $12,000 <small>/month</small>
                           </h2>
                        </div>
                        <div class="card-footer">
                           <span><i class="mdi mdi-sofa"></i> Beds : <strong>8</strong></span>
                           <span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>4</strong></span>
                           <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>120 sq ft</strong></span>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="card card-list">
                     <a href="#">
                        <span class="badge badge-info">For Rent</span>
                        <img class="card-img-top" src="img/list/6.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Villa on Hollywood Boulev</h5>
                           <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> The Village,
                              Jersey City, NJ 07302, USA
                           </h6>
                           <div class="review-block-rate">
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <i class="mdi mdi-star-outline"></i>
                              <span class="badge-pill badge-success ml-2">3.2</span>
                           </div>
                           <h2 class="text-success mb-0 mt-3">
                              $356, 000 <small>/month</small>
                           </h2>
                        </div>
                        <div class="card-footer">
                           <span><i class="mdi mdi-sofa"></i> Beds : <strong>1</strong></span>
                           <span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>3</strong></span>
                           <span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>187 sq ft</strong></span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Properties List -->
      <!-- Trusted Agents -->
      <section class="section-padding bg-white">
         <div class="section-title text-center mb-5">
            <h2>Trusted Agents</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="agents-card text-center">
                     <img class="img-fluid mb-4" src="img/user/1.jpg" alt="">
                     <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been.
                     </p>
                     <h6 class="mb-0 text-success">- Stave Martin</h6>
                     <small>Buying Agent</small>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="agents-card text-center">
                     <img class="img-fluid mb-4" src="img/user/2.jpg" alt="">
                     <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been.
                     </p>
                     <h6 class="mb-0 text-success">- Mark Smith</h6>
                     <small>Selling Agent</small>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="agents-card text-center">
                     <img class="img-fluid mb-4" src="img/user/3.jpg" alt="">
                     <p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been.
                     </p>
                     <h6 class="mb-0 text-success">- Ryan Printz</h6>
                     <small>Real Estate Broker</small>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Trusted Agents -->
      <!-- Plans -->
      <section class="section-padding">
         <div class="section-title text-center mb-5">
            <h2>Choose a Plans</h2>
            <p>Upgrade your space for higher rankings, powerful features & more ways<br>to connect with potential
               customers.
            </p>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="card">
                     <!-- Header -->
                     <header class="card-header text-center p-5 border-0">
                        <h4 class="h6 text-danger mb-2">Starter</h4>
                        <span class="d-block">
                        <span class="display-4 text-dark font-weight-normal">
                        <span class="small">$</span>199
                        </span>
                        <span class="d-block text-secondary">Per Year</span>
                        </span>
                     </header>
                     <!-- End Header -->
                     <!-- Content -->
                     <div class="card-body p-4">
                        <ul class="list-group list-group-flush mb-4">
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> Community support</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> 400+ pages</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> 100+ header variations</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> 20+ home page options</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> Priority Support</li>
                        </ul>
                        <button type="button" class="btn btn-block btn-light" tabindex="0">Contact Us</button>
                     </div>
                     <!-- End Content -->
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card">
                     <!-- Header -->
                     <header class="card-header text-center p-5 border-0">
                        <h4 class="h6 text-warning mb-2">Basic</h4>
                        <span class="d-block">
                        <span class="display-4 text-dark font-weight-normal">
                        <span class="small">$</span>399
                        </span>
                        <span class="d-block text-secondary">Per Year</span>
                        </span>
                     </header>
                     <!-- End Header -->
                     <!-- Content -->
                     <div class="card-body p-4">
                        <ul class="list-group list-group-flush mb-4">
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> Community support</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 400+ pages</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 100+ header variations</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> 20+ home page options</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> Priority Support</li>
                        </ul>
                        <button type="button" class="btn btn-block btn-light" tabindex="0">Subscribe</button>
                     </div>
                     <!-- End Content -->
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card">
                     <!-- Header -->
                     <header class="card-header text-center p-5 border-0">
                        <h4 class="h6 text-success mb-2">Company</h4>
                        <span class="d-block">
                        <span class="display-4 text-dark font-weight-normal">
                        <span class="small">$</span>1099
                        </span>
                        <span class="d-block text-secondary">Per Year</span>
                        </span>
                     </header>
                     <!-- End Header -->
                     <!-- Content -->
                     <div class="card-body p-4">
                        <ul class="list-group list-group-flush mb-4">
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> Community support</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 400+ pages</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 100+ header variations</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 20+ home page options</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-close-circle-outline text-danger mr-1"></i> riority Support</li>
                        </ul>
                        <button type="button" class="btn btn-block btn-light" tabindex="0">Subscribe</button>
                     </div>
                     <!-- End Content -->
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card">
                     <!-- Header -->
                     <header class="card-header text-center p-5 border-0">
                        <h4 class="h6 text-danger mb-2">Enterprise</h4>
                        <span class="d-block">
                        <span class="display-4 text-dark font-weight-normal">
                        Help
                        </span>
                        <span class="d-block text-secondary font-size-1">no user limit</span>
                        </span>
                     </header>
                     <!-- End Header -->
                     <!-- Content -->
                     <div class="card-body p-4">
                        <ul class="list-group list-group-flush mb-4">
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> Community support</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 400+ pages</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 100+ header variations</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> 20+ home page options</li>
                           <li class="list-group-item py-2 px-0 border-0"><i
                              class="mdi mdi-check-circle-outline text-success mr-1"></i> riority Support</li>
                        </ul>
                        <button type="button" class="btn btn-block btn-primary" tabindex="0">Contact Us</button>
                     </div>
                     <!-- End Content -->
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Plans -->
      <!-- Blog -->
      <section class="section-padding bg-white">
         <div class="section-title text-center mb-5">
            <h2>Blogs We Wrote For You</h2>
            <p>Lorem ipsum dolor sit amet.</p>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="card blog-card">
                     <a href="#">
                        <img class="card-img-top" src="img/blog/1.png" alt="Card image cap">
                        <div class="card-body">
                           <span class="badge badge-success">House/Villa</span>
                           <h6>Possimus aut mollitia eum ipsum</h6>
                           <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia
                              eum ipsum fugiat odio officiis odit.
                           </p>
                        </div>
                        <div class="card-footer">
                           <p class="mb-0"><img class="rounded-circle" src="img/user/3.jpg" alt="Card image cap">
                              <strong>Rahul Yadav</strong> On October 03, 2020
                           </p>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="card blog-card">
                     <a href="#">
                        <img class="card-img-top" src="img/blog/2.png" alt="Card image cap">
                        <div class="card-body">
                           <span class="badge badge-danger">Shop/Showroom</span>
                           <h6>Consectetur adipisicing elit</h6>
                           <p class="mb-0">Cnsectetur ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut
                              mollitia eum ipsum fugiat odio officiis odit.
                           </p>
                        </div>
                        <div class="card-footer">
                           <p class="mb-0"><img class="rounded-circle" src="img/user/2.jpg" alt="Card image cap">
                              <strong>Rahul Yadav</strong> On October 05, 2020
                           </p>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="card blog-card">
                     <a href="#">
                        <img class="card-img-top" src="img/blog/3.png" alt="Card image cap">
                        <div class="card-body">
                           <span class="badge badge-info">Industrial Building</span>
                           <h6>Fugiat odio officiis odit</h6>
                           <p class="mb-0">Mollitia ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut
                              mollitia eum ipsum fugiat odio officiis odit.
                           </p>
                        </div>
                        <div class="card-footer">
                           <p class="mb-0"><img class="rounded-circle" src="img/user/1.jpg" alt="Card image cap">
                              <strong>Rahul Yadav</strong> On October 06, 2020
                           </p>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Blog -->
      <!-- Join Team -->
      <section class="py-5 bg-primary">
         <div class="container">
            <div class="row align-items-center text-center text-md-left">
               <div class="col-md-8">
                  <h2 class="text-white my-2">Join Our Professional Team & Agents</h2>
               </div>
               <div class="col-md-4 text-center text-md-right">
                  <button type="button" class="btn btn-outline-light my-2">Read More</button> <button type="button"
                     class="btn btn-light my-2">Contact Us</button>
               </div>
            </div>
         </div>
      </section>
      <!-- End Join Team -->
@endsection

@section('modals')

@endsection

@section('scripts')

@endsection

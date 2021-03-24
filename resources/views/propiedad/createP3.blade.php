@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

<style>
   #geomap{
    width: 100%;
    height: 400px;
}
</style>
@endsection

@section('content')

<section class="section-padding">
    <div class="section-title text-center mb-0">
       <h2>Empieza describiendo el inmueble</h2>
    </div>
</section>

<section id="confirmarCategoria">
    <div class="container">
        <div class="row">
			<div class="col-lg-12 simulador-container">
				<div class="card">
					<div class="card-header">
						<h5 class="subtitulo-isbast text-center">Elige el inmueble que quieres publicar</h5>
					</div>

					<div class="card-body m-2">
                        <h6>Confirma la categoría que elegiste</h6>
                        <p>Una vez que publiques, no podrás cambiar los datos que acabas de completar.</p>

                        <div class="my-2 my-lg-0" style="float: right">
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

<section id="maps">
   <div class="container">
      <div class="row">
       <div class="col-lg-12 simulador-container">
          <div class="card">
             <div class="card-header">
                <h5 class="subtitulo-isbast text-center">¿Cuál es la ubicación exacta del inmueble?</h5>
             </div>
             <!-- search input box -->
                <br>
                <div class="form-group input-group col-lg-12" style="float: Center">
                    <input type="text" id="search_location" class="form-control" placeholder="ingresa direccion">
                </div>
               <div id="geomap" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2) !important;" >
               </div>
               <br>
               <div class="my-2 my-lg-0" style="float: right" id="confirmacionMaps">
                    <ul class="list-inline main-nav-right" style="align:Center ">
                       <li class="list-inline-item">
                        <a class="btn btn-link btn-sm" >Cancelar</a>
                       </li>
                       <li class="list-inline-item">
                          <button type="button" class="btn btn-success btn-sm"  onclick="confirmarMaps();" >Confirmar</button>
                       </li>
                    </ul>
               </div>
          </div>
       </div>
    </div>
  </div>
</section>

<section id="formularioRegistro">
    <div class="container">
       <div class="row">
        <div class="col-lg-12 simulador-container">
           <div class="card">
              <div class="card-header">
                 <h5 class="subtitulo-isbast text-center">Formulario de registro</h5>
              </div>
              <!-- search input box -->
              <form>
                <input type="hidden" id="inputAddr" class="search_addr" size="45">
                <input type="hidden" id="inputLatitude"  class="search_latitude" size="30">
                <input type="hidden" id="inputLongitude"  class="search_longitude" size="30">

                <div>
                  <div class="card-body m-3">
                      <h4>Completa las características del inmueble</h4>
                      <p>Tendrás mejor ubicación en los resultados de búsqueda y los interesados tendrán toda la información que necesitan.</p>
                      <div class="row">

                          <div class="form-group col-md-3">
                              <label>Superficie total</label>
                             <input type="text" class="form-control">

                          </div>
                          <div class="form-group col-md-1">
                              <label></label>
                              <select class="form-control custom-select">
                                  <option>ha</option>
                                  <option>m²</option>
                               </select>
                          </div>
                          <div class="form-group col-md-4">
                             <label>Superficie útil (obligatorio) <span class="text-danger">*</span></label>
                             <input type="text" class="form-control" >
                          </div>
                          <div class="form-group col-md-4">
                             <label>Huéspedes (obligatorio)<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" >
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label>Dormitorios (obligatorio)<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" >
                           </div>
                          <div class="form-group col-md-4">
                             <label>Baños (obligatorio)<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" >
                          </div>
                          <div class="form-group col-md-4">
                             <label>Estacionamientos (obligatorio)<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" placeholder="Si no tiene estacionamientos, indica 0.">
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Camas</label><span class="text-danger">*</span></label>
                              <input type="text" class="form-control" >
                           </div>
                          <div class="form-group col-md-6">
                             <label>Bodegas<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" >
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Cantidad de pisos<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" >
                           </div>
                          <div class="form-group col-md-6">
                             <label>Departamentos por piso<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" >
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col-md-6">
                              <label>Numero de piso de la unidad<span class="text-danger">*</span></label>
                              <input type="text" class="form-control" >
                           </div>
                          <div class="form-group col-md-6">
                             <label>Estadia minima(noches)<span class="text-danger">*</span></label>
                             <input type="text" class="form-control" >
                          </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6">
                            <label>Orientacion<span class="text-danger">*</span></label>
                            <select class="form-control custom-select">
                                <option selected>Elegir</option>
                                <option>NO</option>
                                <option>NP</option>¨
                                <option>SO</option>
                                <option>SP</option>
                                <option>NOSP</option>
                                <option>S</option>
                                <option>P</option>
                                <option>N</option>
                                <option>O</option>
                             </select>
                         </div>
                        <div class="form-group col-md-6">
                           <label>Antiguedad<span class="text-danger">*</span></label>
                           <input type="text" class="form-control" >
                        </div>
                      </div>
                      <div class="card property-features-add padding-card">
                        <div class="card-body">
                           <h6 class="card-title mb-4">Otras características</h6>
                           <p>Agrega más detalles del inmueble para que los interesados lo conozcan mejor.</p>
                            <!-- Servicios-->
                           <div class="col-lg-12">
                            <!--Listing Details starts-->
                            <div class="list-details-wrap">
                                <div id="buy" class="list-details-section">
                                    <div id="accordion1" role="tablist">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingOne">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Servicios
                                                </a>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($servicios as $servicio )
                                                          <div class="col-md-4">
                                                              <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="{{$servicio->idServicio}}">
                                                              <label class="custom-control-label" for="{{$servicio->idServicio}}" value="{{$servicio->idServicio}}">{{$servicio->nombreServicio}}</label>
                                                              </div>
                                                          </div>
                                                        @endforeach
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FAQ Section starts-->
                           </div>
                           <!-- Comodidades y equipamiento-->
                           <div class="col-lg-12">
                            <!--Listing Details starts-->
                            <div class="list-details-wrap">
                                <div id="buy" class="list-details-section">
                                    <div id="accordion2" role="tablist">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingTwo">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                    Comodidades y equipamiento
                                                </a>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($servicios as $servicio )
                                                          <div class="col-md-4">
                                                              <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="{{$servicio->idServicio}}">
                                                              <label class="custom-control-label" for="{{$servicio->idServicio}}" value="{{$servicio->idServicio}}">{{$servicio->nombreServicio}}</label>
                                                              </div>
                                                          </div>
                                                        @endforeach
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FAQ Section starts-->
                           </div>
                           <!--Ambientes-->
                           <div class="col-lg-12">
                            <!--Listing Details starts-->
                            <div class="list-details-wrap">
                                <div id="buy" class="list-details-section">
                                    <div id="accordion3" role="tablist">
                                        <div class="card">
                                            <div class="card-header" role="tab" id="headingThree">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                 Ambientes
                                                </a>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($servicios as $servicio )
                                                          <div class="col-md-4">
                                                              <div class="custom-control custom-checkbox">
                                                              <input type="checkbox" class="custom-control-input" id="{{$servicio->idServicio}}">
                                                              <label class="custom-control-label" for="{{$servicio->idServicio}}" value="{{$servicio->idServicio}}">{{$servicio->nombreServicio}}</label>
                                                              </div>
                                                          </div>
                                                        @endforeach
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--FAQ Section starts-->
                           </div>

                        </div>
                     </div>
                  </div>
                </div>
              </form>

           </div>
        </div>
     </div>
   </div>
</section>



@endsection

@section('modals')

@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyChXiGEyXk4hNpeiAR8EyBDWzHVZJxMk2U"></script>

<script>

   $('#maps').hide();
   $('#formularioRegistro').hide();

      function confirmarCategoria() {
         $('#confirmarCategoria').hide();
         $('#maps').show();
      }

      function confirmarMaps() {
        if ($('.search_latitude').val() ==  '' && $('.search_longitude').val() == '') {
            $('#maps').hide();
            $('#formularioRegistro').show();
        } else {
            toastr.error("Ingrese una direccion");
        }
      }



   var geocoder;
   var map;
   var marker;
   /*
    * Google Map with marker
    */
   function initialize() {
       var initialLat = $('.search_latitude').val();
       var initialLong = $('.search_longitude').val();
       initialLat = initialLat?initialLat:36.169648;
       initialLong = initialLong?initialLong:-115.141000;

       var latlng = new google.maps.LatLng(initialLat, initialLong);
       var options = {
           zoom: 16,
           center: latlng,
           mapTypeId: google.maps.MapTypeId.ROADMAP
       };

       map = new google.maps.Map(document.getElementById("geomap"), options);

       geocoder = new google.maps.Geocoder();

       marker = new google.maps.Marker({
           map: map,
           draggable: true,
           position: latlng
       });

       google.maps.event.addListener(marker, "dragend", function () {
           var point = marker.getPosition();
           map.panTo(point);
           geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
               if (status == google.maps.GeocoderStatus.OK) {
                   map.setCenter(results[0].geometry.location);
                   marker.setPosition(results[0].geometry.location);
                   $('.search_addr').val(results[0].formatted_address);
                   $('.search_latitude').val(marker.getPosition().lat());
                   $('.search_longitude').val(marker.getPosition().lng());
               }
           });
       });

   }

   $(document).ready(function () {
       //load google map
       initialize();
       /*
        * autocomplete location search
        */
       var PostCodeid = '#search_location';
       $(function () {
           $(PostCodeid).autocomplete({
               source: function (request, response) {
                   geocoder.geocode({
                       'address': request.term
                   }, function (results, status) {
                       response($.map(results, function (item) {
                           return {
                               label: item.formatted_address,
                               value: item.formatted_address,
                               lat: item.geometry.location.lat(),
                               lon: item.geometry.location.lng()
                           };
                       }));
                   });
               },
               select: function (event, ui) {
                   $('.search_addr').val(ui.item.value);
                   $('.search_latitude').val(ui.item.lat);
                   $('.search_longitude').val(ui.item.lon);
                   var latlng = new google.maps.LatLng(ui.item.lat, ui.item.lon);
                   marker.setPosition(latlng);
                   initialize();
               }
           });
       });

       /*
        * Point location on google map
        */
       $('.get_map').click(function (e) {
           var address = $(PostCodeid).val();
           geocoder.geocode({'address': address}, function (results, status) {
               if (status == google.maps.GeocoderStatus.OK) {
                   map.setCenter(results[0].geometry.location);
                   marker.setPosition(results[0].geometry.location);
                   $('.search_addr').val(results[0].formatted_address);
                   $('.search_latitude').val(marker.getPosition().lat());
                   $('.search_longitude').val(marker.getPosition().lng());
               } else {
                   alert("Geocode was not successful for the following reason: " + status);
               }
           });
           e.preventDefault();
       });

       //Add listener to marker for reverse geocoding
       google.maps.event.addListener(marker, 'drag', function () {
           geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
               if (status == google.maps.GeocoderStatus.OK) {
                   if (results[0]) {
                       $('.search_addr').val(results[0].formatted_address);
                       $('.search_latitude').val(marker.getPosition().lat());
                       $('.search_longitude').val(marker.getPosition().lng());
                   }
               }
           });
       });
   });
   </script>


@endsection


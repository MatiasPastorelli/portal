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
               <div class="my-2 my-lg-0" style="float: right">
                <ul class="list-inline main-nav-right" style="align:Center ">
                   <li class="list-inline-item">
                    <a class="btn btn-link btn-sm" href="/propiedadCreate?p=1">cancelar</a>
                   </li>
                   <li class="list-inline-item">
                      <a class="btn btn-success btn-sm" onclick="confirmarMaps();" >Confirmar</a>
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


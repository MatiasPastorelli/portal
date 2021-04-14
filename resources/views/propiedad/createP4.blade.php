@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')

<style>
   #geomap{
    width: 95%;
    height: 400px;
    margin: auto;
}
</style>
@endsection

@section('content')
@include('common.errors')

<br>
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
                @if (Crypt::decrypt($request->categoria) == 2 and $request->tipoComercial == 3)
                    @include('propiedad.forms.departamento.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 3 and $request->tipoComercial == 3)
                    @include('propiedad.forms.casa.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 4 and $request->tipoComercial == 3)
                    @include('propiedad.forms.oficina.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 5 and $request->tipoComercial == 3)
                    @include('propiedad.forms.terreno.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 6 and $request->tipoComercial == 3)
                    @include('propiedad.forms.locales.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 7 and $request->tipoComercial == 3)
                    @include('propiedad.forms.parcelas.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 8 and $request->tipoComercial == 3)
                    @include('propiedad.forms.bodegas.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 9 and $request->tipoComercial == 3)
                    @include('propiedad.forms.industriales.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 10 and $request->tipoComercial == 3)
                    @include('propiedad.forms.agricolas.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 11 and $request->tipoComercial == 3)
                    @include('propiedad.forms.estacionamiento.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 12 and $request->tipoComercial == 3)
                    @include('propiedad.forms.loteCemento.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 13 and $request->tipoComercial == 3)
                    @include('propiedad.forms.otroInmueble.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 14 and $request->tipoComercial == 3)
                    @include('propiedad.forms.loteos.venta')
                @endif
                @if (Crypt::decrypt($request->categoria) == 15 and $request->tipoComercial == 3)
                    @include('propiedad.forms.sitios.venta')
                @endif
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

document.getElementById("file").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('preview'),
            image = document.createElement('img');

    image.src = reader.result;

    preview.innerHTML = '';
    preview.append(image);
  };
}

</script>

<script>


      function confirmarMaps() {
        if ($('.search_latitude').val() ==  '' &&  $('.search_longitude').val() == '') {
            toastr.error("Ingrese una direccion");
            { location.href = "#maps"; }
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


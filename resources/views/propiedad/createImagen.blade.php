@extends('layout.presentacion.app')

@section('title', 'Caza - Caza tu casa')

@section('meta')

@endsection

@section('css')
<link href="https://unpkg.com/dropzone/dist/dropzone.css" rel="stylesheet"/>
@endsection

@section('content')
@include('common.errors')

<div class="row"><div class="col-lg-12">&nbsp;</div></div>
<div class="row"><div class="col-lg-12">&nbsp;</div></div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <strong>Subir</strong><small> Imagenes</small>
                    </div>

                    <div class="card-body">
                        <div></div>
                        <div class="dropzone" id="myDropZone"></div>
                    </div>

                    <div class="card-body m-2">
                        <div class="my-2 my-lg-0" style="float: right">
                            <ul class="list-inline main-nav-right" style="align:Center ">
                            <li class="list-inline-item">
                                <a class="btn btn-success btn-sm" href="/propiedad">Volver</a>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Imagenes</strong><small> Cargadas</small>
                </div>

                <div class="card-body">
                    <div class="row">
                        @if (isset($fotos))
                            @foreach($fotos as $foto)
                                <div class="col-xl-4">
                                    <div class="card" style="width: 18rem;">
                                      <img src="/img/propiedades/{{ $foto->linkFoto }}" class="card-img-top" alt="...">
                                      <div class="card-footer">
                                            <form action="/img/eliminar/{{ $foto->idFoto }}" method="POST">
                                                @csrf
                                                <input id="idPropiedad" name="idPropiedad" type="hidden" value="{{$request->id}}">
                                                <button type="submit" class="btn btn-link btn-sm pull-right">Eliminar</button>
                                            </form>
                                      </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row"><div class="col-lg-12">&nbsp;</div></div>
<div class="row"><div class="col-lg-12">&nbsp;</div></div>


@endsection

@section('modals')

@endsection

@section('scripts')
<script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js"></script>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>
<script type="text/javascript">

    // "myDropZone" es el ID de nuestro formulario usando la notaci??n camelCase
    Dropzone.options.myDropZone = {
        url: '/img/subir/{{$propiedad}}',
        paramName: "file", // Las im??genes se van a usar bajo este nombre de par??metro
        maxFilesize: 1,
        maxFiles: 1,
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        transformFile: function(file, done) {

            var myDropZone = this;

            // Create the image editor overlay
            var editor = document.createElement('div');
            editor.style.position = 'fixed';
            editor.style.left = 0;
            editor.style.right = 0;
            editor.style.top = 0;
            editor.style.bottom = 0;
            editor.style.zIndex = 9999;
            editor.style.backgroundColor = '#000';

            // Create the confirm button
            var confirm = document.createElement('button');
            confirm.style.position = 'absolute';
            confirm.style.left = '10px';
            confirm.style.top = '10px';
            confirm.style.zIndex = 9999;
            confirm.textContent = 'GUARDAR';
            confirm.addEventListener('click', function() {

              // Get the canvas with image data from Cropper.js
              var canvas = cropper.getCroppedCanvas({
                width: 1024,
                height: 768,
                minWidth: 1024,
                minHeight:768,
                maxWidth: 1024,
                maxHeight: 768,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
              });

              // Turn the canvas into a Blob (file object without a name)
              canvas.toBlob(function(blob) {

                // Update the image thumbnail with the new image data
                myDropZone.createThumbnail(
                  blob,
                  myDropZone.options.thumbnailWidth,
                  myDropZone.options.thumbnailHeight,
                  myDropZone.options.thumbnailMethod,
                  false,
                  function(dataURL) {

                    // Update the Dropzone file thumbnail
                    myDropZone.emit('thumbnail', file, dataURL);

                    // Return modified file to dropzone
                    done(blob);
                  }
                );

              });

              // Remove the editor from view
              editor.parentNode.removeChild(editor);

            });
            editor.appendChild(confirm);

            // Load the image
            var image = new Image();
            image.src = URL.createObjectURL(file);
            editor.appendChild(image);

            // Append the editor to the page
            document.body.appendChild(editor);

            // Create Cropper.js and pass image
            var cropper = new Cropper(image, {
              aspectRatio: 3 / 2,
              dragMode: 'move',
              data:
              {
                width: 1024,
                height:  768,
              },
            });
        },success: function(file, response){
            window.location.reload();
        }
    };
</script>


@endsection

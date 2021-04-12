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
                        <!--
                        <form action="{{ asset('/img/subir/' . $propiedad) }}" class="dropzone" id="my-awesome-dropzone">
                            @csrf
                        </form>
                        -->
                        <div></div>
                        <div class="dropzone" id="myDropZone"></div>
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
    // "myDropZone" es el ID de nuestro formulario usando la notación camelCase
    Dropzone.options.myDropZone = {
        url: '/img/subir/{{$propiedad}}',
        paramName: "file", // Las imágenes se van a usar bajo este nombre de parámetro
        maxFilesize: 10, // Tamaño máximo en MB
        addRemoveLinks: true,
        removedfile: function(file)
            {
                var propiedad = {{$propiedad}}
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                    type: 'POST',
                    url: '{{ url("/img/eliminar") }}',
                    data: {fileName: name , Propiedad : propiedad},
                    success: function (data){
                        console.log("funciona");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
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
                height: 768 ,
                minWidth:  1024,
                minHeight:  768,
                maxWidth:  1024,
                maxHeight:  768 ,
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
        }
    };
</script>


@endsection

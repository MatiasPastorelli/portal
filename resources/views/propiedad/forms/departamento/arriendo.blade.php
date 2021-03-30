<form>
    <input type="hidden" id="inputAddr" name="inputAddr" class="search_addr" size="45">
    <input type="hidden" id="inputLatitude"  name="inputLatitude" class="search_latitude" size="30">
    <input type="hidden" id="inputLongitude" name="inputLongitude" class="search_longitude" size="30">
    <div>
      <div class="card-body m-3">
            <h4>Completa las características del inmueble</h4>
            <p>Tendrás mejor ubicación en los resultados de búsqueda y los interesados tendrán toda la información que necesitan.</p>
            <div class="row">

                <div class="form-group col-md-4">
                    <label>Superficie total (obligatorio)</label>
                    <input type="text" class="form-control">

                </div>
                <div class="form-group col-md-4">
                    <label>Superficie útil (obligatorio) <span class="text-danger">*</span></label>
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
            <br>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Baño de visitas</label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Dormitorio y baño de servicio</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Jardin</label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Parrilla</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Piscina</label>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Terraza</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Uso comercial</label>
                    </div>
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
                                                @foreach ($comodidades as $comodidad )
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{$comodidad->idComodidadEquipamiento}}">
                                                    <label class="custom-control-label" for="{{$comodidad->idComodidadEquipamiento}}" value="{{$comodidad->idComodidadEquipamiento}}">{{$comodidad->nombreComodidadEquipamiento}}</label>
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
                                                @foreach ($ambientes as $ambiente )
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{$ambiente->idAmbiente}}">
                                                    <label class="custom-control-label" for="{{$ambiente->idAmbiente}}" value="{{$ambiente->idAmbiente}}">{{$ambiente->nombreAmbiente}}</label>
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
                <!--Espacios comunes-->
                <div class="col-lg-12">
                    <!--Listing Details starts-->
                    <div class="list-details-wrap">
                        <div id="buy" class="list-details-section">
                            <div id="accordion4" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingFour">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion4" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            Espacios comunes
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($espaciosComunes as $espacioComun )
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{$espacioComun->idEspacioComun}}">
                                                    <label class="custom-control-label" for="{{$espacioComun->idEspacioComun}}" value="{{$espacioComun->idEspacioComun}}">{{$espacioComun->nombreEspacioComun}}</label>
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
                <!--Seguridad-->
                <div class="col-lg-12">
                    <!--Listing Details starts-->
                    <div class="list-details-wrap">
                        <div id="buy" class="list-details-section">
                            <div id="accordion5" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingFive">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion5" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                            Seguridad
                                        </a>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach ($seguridades as $seguridad )
                                                <div class="col-md-4">
                                                    <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{$seguridad->idSeguridad}}">
                                                    <label class="custom-control-label" for="{{$seguridad->idSeguridad}}" value="{{$seguridad->idSeguridad}}">{{$seguridad->nombreSeguridad}}</label>
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 simulador-container">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="subtitulo-isbast text-center">¿Quieres agregar una descripción?
                                    | Opcional</h5>
                            </div>

                            <div class="card-body m-2">
                                <h6>No incluyas datos de contacto como teléfono, e-mail, links o redes sociales.</h6>

                                <div class="form-group">
                                    <label for="datosOpcionales" name="datosOpcionales"></label>
                                    <textarea class="form-control" rows="3" placeholder="¿Te falto contar algo? Agregalo como descripcion."></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 simulador-container">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="subtitulo-isbast text-center">¿Quieres agregar un video o tour virtual?
                                    | Opcional</h5>
                            </div>

                            <div class="card-body m-2">
                                <h6>Agrega tu video de YouTube, ¡puedes mostrar la propiedad en 360! Si prefieres, sube un tour virtual de Matterport para que se vean todos los detalles.</h6>

                                <div class="form-group">
                                    <input class="form-control" type="text" name='urlVideo' placeholder="ingresa url de youtube">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <br>
      </div>
    </div>
</form>

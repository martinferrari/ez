<?php $titulo_pagina = ($idioma == 'es') ? ES_CONTACTO : EN_CONTACTO; ?>
<!-- subheader -->
<div class="contacto">
<section id="subheader"  data-type="background">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $titulo_pagina; ?></h1>
            </div>
        </div>
    </div>
</section>
<!-- subheader -->
</div>

<div id="content" class="no-top">
    <section class="no-top" aria-label="map-container">
        <div id="map"></div>
    </section>

    <div class="container">
        <?php if($idioma == "es"):
            $envianos_mensaje = "Envianos un Mensaje";
            $solicitar_entrevista = "Solicitar Entrevista";
            $trabaja = "Trabaja con nosotros";
        else:
            $envianos_mensaje = "Send us a message";
            $solicitar_entrevista = "Request Interview";
            $trabaja = "Work with us";
        endif;
        ?>
        <div class="row">
            <div class="col-md-12" style="padding-bottom: 20px;">
                <h3 style="padding-bottom: 30px;"><?php echo $envianos_mensaje; ?></h3>
                <div class="col-md-6" style="background-color: #9d3c34; text-align: center; padding: 10px;">
                    <a href="" class="btn bnt-line-white btn-big" data-toggle="modal" data-target="#modalEntrevista"><?php echo $solicitar_entrevista; ?></a>
                </div>
                
                <div class="col-md-6" style="background-color: gray; text-align: center; padding: 10px;">
                    <a href="" class="btn bnt-line-white btn-big" data-toggle="modal" data-target="#modalTrabaja"><?php echo $trabaja; ?></a>
                </div>
            </div>
        </div>
    </div>
</div>    





<?php //MODAL Entrevista ?>
<div class="modal fade" id="modalEntrevista" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog ">
		<div class="modal-content">
			<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			  <h4 class="modal-title">Solicitar Entrevista</h4>	
        		
			</div>
			<div class="modal-body">				
				<form class="" action="<?php echo base_url(); ?>web/Contacto/Entrevista" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                            <h4>Datos Personales</h4>
                                <div class="form-group">
                                    <label for="inputName">Nombre y Apellido</label>
                                    <input type="text" class="form-control" id="inputName" name='inputName' placeholder="Ingresa nombre y Apellido" />
                                    <label for="inputName">Telefono</label>
                                    <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Ingresa Telefono" />
                                    
                                    <label for="inputProfesion">Profesion</label>
                                    <input type="text" class="form-control" id="inputProfesion" name="inputProfesion" placeholder="Profesion" />
                                    <label for="inputEmail">Email</label>
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" />
                                </div>
                                <h4>Datos de la Obra</h4>
                                <div class="form-group">
                                    <label for="inputDireccion">Direccion</label>
                                    <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" placeholder="Direccion" />
                                    <label for="inputMedidas">Medidas del terreno</label>
                                    <input type="text" class="form-control" id="inputMedidas" name="inputMedidas" placeholder="10x30" />
                                </div>
                                <h4>Motivo de la Consulta</h4>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Motivo" id="Motivo" value="Construccion Nueva">
                                        <label class="form-check-label" for="Motivo">
                                            Construccion Nueva
                                        </label>
                                        <input class="form-check-input" type="radio" name="Motivo" id="Motivo" value="Reforma">
                                        <label class="form-check-label" for="Motivo">
                                            Reforma
                                        </label>
                                    </div>
                                    <label for="inputMessage">Descripción</label>
                                    <textarea class="form-control" id="inputMessage" name="inputMessage" placeholder="Redacte brevemente el motivo de su consulta"></textarea>
                                </div>
                                <h4>Como nos Conocio</h4>
                                <select class="custom-select mr-sm-2 form-control" id="conocio" name="conocio">
                                    <option selected>Seleccionar</option>
                                    <option value="Obra">Obra</option>
                                    <option value="Redes Sociales">Redes Sociales</option>
                                    <option value="Web">Web</option>
                                    <option value="Publicaciones">Publicaciones</option>
                                    <option value="Recomendacion">Recomendación</option>
                                    <option value="Otro">Otro</option>
                                </select>

							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" id="" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-primary">Enviar Mensaje</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>



<?php //MODAL Trabaja ?>
<div class="modal fade" id="modalTrabaja" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			  <h4 class="modal-title">Trabaja con Nosotros</h4>	
        		<button type="button" class="close" data-dismiss="modal">
					<span><i class="fas fa-times"></i></span>
					<span class="sr-only">Cerrar</span>
				</button>
			</div>
			<div class="modal-body">				
				<form class="" action="<?php echo base_url(); ?>web/Contacto/Trabaja" method="POST">
					<div class="panel">
						<div class="panel-body">
							<div class="row">
                            <h4>Datos Personales</h4>
                            <label for="inputName">Nombre y Apellido</label>
                                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Ingresa nombre y Apellido" />
                                    <label for="inputDNI">DNI</label>
                                    <input type="number" class="form-control" id="inputDNI" name="inputDNI" placeholder="Ingresa Tu DNI" />
                                    <label for="inputDate">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="inputDate" name="inputDate" placeholder="Ingresa Tu Fecha de nacimiento" />
                                    <label for="inputLugarNacimiento">Lugar de Nacimiento</label>
                                    <input type="text" class="form-control" id="inputLugarNacimiento" name="inputLugarNacimiento" placeholder="Lugar de Nacimiento" />
                                    <label for="inputDireccion">Direccion</label>
                                    <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" placeholder="Direccion" />
                                    <label for="inputCivil">Estado Civil</label>
                                    <input type="text" class="form-control" id="inputCivil" name="inputCivil" placeholder="Estado Civil" />
                                    <label for="inputHijos">Hijos</label>
                                    <input type="number" class="form-control" id="inputHijos" name="inputHijos" placeholder="" />
                                    <label for="inputTelefono">Telefono</label>
                                    <input type="number" class="form-control" id="inputTelefono" name="inputTelefono" placeholder="Telefono" />
                                    
                                  
                                    <label for="inputProfesion">Profesion</label>
                                    <input type="text" class="form-control" id="inputProfesion" name="inputProfesion" placeholder="Profesion" />
                                    <label for="inputEntidad">Entidad que Otorga el Titulo</label>
                                    <input type="text" class="form-control" id="inputEntidad" name="inputEntidad" placeholder="Entidad" />
                                    <label for="inputEmail">Email</label>
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="ingrese su email" />

                             
                                <h4>Datos Laborales</h4>
                                <div class="form-group">
                                    <label for="primertrabajo"> Es su Primer Trabajo? si no fuera especifique trabajo anterior</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="primertrabajo" name="primertrabajo" value="SI">
                                        <label class="form-check-label">
                                            SI
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="primertrabajo" name="primertrabajo" value="NO">
                                        <label class="form-check-label">
                                            NO
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" id="inputTrabajoAnterior" placeholder="Descripcion Trabajo Anterior" />
                                    <label for="TituloOtorgado">Posee Titulo Universitario Otorgado?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tituloOtorgado" id="tituloOtorgado" value="SI">
                                        <label class="form-check-label">
                                            SI
                                        </label>
                                        <input class="form-check-input" type="checkbox" name="tituloOtorgado" id="tituloOtorgado" value="NO">
                                        <label class="form-check-label">
                                            NO
                                        </label>
                                    </div>
                                    <label for="matricula">Posee matricula del Colegio de Arquitecos de Formosa vigente?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="matricula" name="matricula" value="SI">
                                        <label class="form-check-label">
                                            SI
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="matricula" name="matricula" value="NO">
                                        <label class="form-check-label">
                                            NO
                                        </label>
                                    </div>
                                    <label for="movilidad"> Posee medio de movilidad? Especificar tipo</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="movilidad" name="movilidad" value="SI">
                                        <label class="form-check-label">
                                            SI
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="movilidad" name="movilidad" value="NO">
                                        <label class="form-check-label">
                                            NO
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" id="tipodemedio" name="tipodemedio" placeholder="Medio de Transporte" />
                                    <label for="inputDireccion"> Posee licencia de Conducir? Especificar tipo</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="licencia" name="licencia" value="SI">
                                        <label class="form-check-label">
                                            SI
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="licencia" name="licencia" value="NO">
                                        <label class="form-check-label">
                                            NO
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" id="TipoLicencia" name="TipoLicencia" placeholder="Tipo Licencia" />
                                </div>
                                <h4>Dipobinilidad Horaria</h4>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="DispoHoraria" name="DispoHoraria" value="Por la mañana" checked>
                                        <label class="form-check-label" for="DispoHoraria">
                                            Por la Mañana
                                        </label></br>
                                        <input class="form-check-input" type="radio" id="DispoHoraria" name="DispoHoraria" value="Por la Tarde" checked>
                                        <label class="form-check-label" for="DispoHoraria">
                                            Por la Tarde
                                        </label></br>
                                        <input class="form-check-input" type="radio" id="DispoHoraria" name="DispoHoraria" value="Jornada Completa" checked>
                                        <label class="form-check-label" for="DispoHoraria">
                                            Jornada Completa
                                        </label>
                                    </div>
                                </div>
                                <h4>Datos Complementarios</h4>
                                <label for="nosconoce"> Conoce el Estudio?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="nosconoce" name="nosconoce" value="SI">
                                    <label class="form-check-label">
                                        SI
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="nosconoce" name="nosconoce" value="NO">
                                    <label class="form-check-label">
                                        NO
                                    </label>
                                </div>
                                <label for="conoceobras"> Conoce las Obras del Estudio?  tiene alguna identificada?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="conoceobras" name="conoceobras" value="SI">
                                    <label class="form-check-label">
                                        SI
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="conoceobras" name="conoceobras" value="NO">
                                    <label class="form-check-label">
                                        NO
                                    </label>
                                </div>
                                <input type="text" class="form-control" id="ObraIdentificada" name="obraidentificada" placeholder="Obra Identificada" />
                                <label for="InformoVacante"> Como se informo de la Vacante?</label>
                                <input type="text" class="form-control" id="InformoVacante" name="InformoVacante" placeholder="" />
                                <label for="inputDireccion"> Sigue nuestra Fan Page de Facebook?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sigueFacebook" name="sigueFacebook" value="SI">
                                    <label class="form-check-label">
                                        SI
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="sigueFacebook" name="sigueFacebook" value="NO">
                                    <label class="form-check-label">
                                        NO
                                    </label>
                                </div>
                                <label for="sigueInstagram"> Sigue nuestra Fan Page de Instagram?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="sigueInstagram" name="sigueInstagram" value="SI">
                                    <label class="form-check-label">
                                        SI
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="sigueInstagram" name="sigueInstagram" value="NO">
                                    <label class="form-check-label">
                                        NO
                                    </label>
                                </div>
                                <label for="inputIDfacebook">ID de Facebook</label>
                                <input type="text" class="form-control" id="inputIDfacebook" name="inputIDfacebook" placeholder="" />
                                <label for="inputIDinstagram">ID de Instagram</label>
                                <input type="text" class="form-control" id="inputIDinstagram" name="inputIDinstagram" placeholder="" />

							</div>
						</div> <?php //panel-body ?>
					</div> <?php //panel ?>
					<div class="modal-footer">
						<button type="button" id="" class="btn btn-sm btn-dark" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-sm btn-primary">Enviar Mensaje</button>
					</div>
				</form>
			</div> <?php //modal-body ?>
		</div> <?php //modal-content ?>
	</div>  <?php //modal-dialog ?>
</div>  <?php //modal ?>


<link rel="stylesheet" href="<?php echo base_url();?>_res/assets/css/leaflet.css">
<script src="<?php echo base_url();?>_res/assets/js/leaflet/leaflet.js" ></script>
<script src="<?php echo base_url();?>_res/assets/js/leaflet/leaflet-providers.js"></script>

<script>

function render_map(){
    var map = L.map('map').setView([-26.188116742567207, -58.16300429346104], 17);
    
	var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
	}).addTo(map);

    L.tileLayer.provider('Jawg.Dark', {
        accessToken: 'OFitt33Ueojq65oJTCgms50ZcPyCaXSwQDpGp2H6MLRcIMiy86d3kXFjoZ2YOWS9'
    }).addTo(map);

    var ubicacion = L.icon({
        iconUrl: '<?php echo base_url(); ?>_res/assets/images/map-marker.png',
        iconSize:     [50, 50], // size of the icon
    });
    L.marker([-26.18799385219119, -58.16300893197799], {icon: ubicacion}).addTo(map).bindPopup("Belgrano 1349");
}
	

</script>
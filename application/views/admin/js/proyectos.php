<script>

$(".acciones").on('click', function(){
		var accion = $(this).data("accion");
		var id = $(this).parent().siblings(".id").val();
		var titulo = $(this).parent().siblings(".titulo").val();
		var descripcion = $(this).parent().siblings(".descripcion").val();
		var fecha_alta = $(this).parent().siblings(".fecha_alta").val();
		var anio_proyecto = $(this).parent().siblings(".anio_proyecto").val();

		var proyecto = $(this).parent().siblings(".proyecto").val();
		var ejecucion = $(this).parent().siblings(".ejecucion").val();
		var construccion_direccion = $(this).parent().siblings(".construccion_direccion").val();
		var disenio_dim_estruc = $(this).parent().siblings(".disenio_dim_estruc").val();
		var tipologia = $(this).parent().siblings(".tipologia").val();
		var disenio_dim_clim = $(this).parent().siblings(".disenio_dim_clim").val();
		var area = $(this).parent().siblings(".area").val();
		var ubicacion = $(this).parent().siblings(".ubicacion").val();
		var estado = $(this).parent().siblings(".estado").val();
		var prioridad = $(this).parent().siblings(".prioridad").val();
		
		
		if(accion == "detalle"){
			// $("#modalEdicion #me_id").val(id);
			// $("#modalEdicion #me_titulo").val(titulo);
			// $('#modalEdicion #me_descripcion').trumbowyg('html', descripcion);
			// $("#modalEdicion #me_anio_proyecto").val(anio_proyecto);
			// $("#modalEdicion #me_proyecto").val(proyecto);
			// $("#modalEdicion #me_ejecucion").val(ejecucion);
			// $("#modalEdicion #me_construccion_direccion").val(construccion_direccion);
			// $("#modalEdicion #me_disenio_dim_estruc").val(disenio_dim_estruc);
			// $("#modalEdicion #me_tipologia").val(tipologia);
			// $("#modalEdicion #me_disenio_dim_clim").val(disenio_dim_clim);
			// $("#modalEdicion #me_area").val(area);
			// $("#modalEdicion #me_ubicacion").val(ubicacion);
			// $("#modalEdicion #me_estado").val(estado);
			// $("#modalEdicion #me_prioridad").val(prioridad);
			
			$("#btn_borrar").attr("href", "<?php echo base_url(); ?>admin/Proyectos/borrar_proyecto/"+parseInt(id));

			


			var string_json = $(this).parent().siblings(".datos").val();
			const datos = JSON.parse(string_json);
			var accion = $(this).data("accion");

			if(accion == "detalle"){
				jQuery.each(datos, function(i, val) {
						$("#me_"+i).val( val );
				});
			}


		} //detalle	

		if(accion == "imagenes"){
			$("#mei_id").val(id);
			cargar_fotos_en_modal(id);
		}
		if(accion == "videos"){
			$("#mev_id").val(id);
			cargar_videos_en_modal(id);
		}

		if(accion == "traduccion"){
			$("#me_idioma_id").val(id);
			cargar_traducciones(id);
		}
		
	});
	

	function cargar_fotos_en_modal(id_proyecto){
		$(".cargando_ajax").fadeIn(200);
		$("#contenedor_fotos").html("");
		
		var url = "<?php echo base_url(); ?>admin/Proyectos/VisualesProyecto";

		$.ajax({
			data: { id_proyecto:id_proyecto, tipo:1},
			type: "POST",
			url: url,
			dataType: 'json',
			success: function (data) {
				
				 $.each(data, function(index, element) {
					var destacada = 0;
					var checked = "";
					var checked_c = "";
					if(element.es_destacada == 1){
						destacada = 1;
						checked = 'checked="checked"';
					}
					if(element.es_destacada_cuadrada == 1){
						destacada_cuadrada = 1;
						checked_c = 'checked="checked"';
					}

					contenido = '<div class="eo_image_thumb">';
					contenido += "<img src='<?php echo base_url(); ?>"+element.path+"'>";
					contenido += "Orden: <input type='text' class='form-control orden' value='"+element.orden+"' name='orden[]'>";
					contenido += '<a href="javascript:void(0);" class="clear_thumb_image btn btn-sm btn-danger">';
					contenido += 'Eliminar Imagen';
					contenido += '</a>';
					contenido += '<input type="hidden" name="eo_borrar_foto[]" class="eo_borrar_foto" value="0">';
					contenido += '<input type="hidden" name="eo_foto_actual[]" class="eo_foto_actual" value="'+element.path+'">';
					contenido += '<input type="hidden" name="eo_id_foto[]" class="eo_id_foto" value="'+element.id+'">';
					contenido += '<label class="destacada"><input type="radio" name="eo_foto_destacada" value="'+element.path+'" '+checked+'>Destacada<label>';
					contenido += '<label class="destacada_cuadrada"><input type="radio" name="eo_foto_destacada_cuadrada" value="'+element.path+'" '+checked_c+'>Destacada cuadrada<label>';
					contenido += '</div>';

					
					$("#contenedor_fotos").append(contenido);

				});
				
				$('.cargando_ajax').fadeOut(200, function() {}); //oculta animacion cargando
			},
			
			error: function(data) {
				console.log("ERROR");
				console.log(data);
			},

		}); //ajax
	} //cargar_fotos_en_modal



	function cargar_traducciones(id){
		$(".cargando_ajax").fadeIn(200);
		
		var url = "<?php echo base_url(); ?>admin/Proyectos/TraduccionProyecto";
		$("#modalTraduccion input.form-control").val('');
		
		$.ajax({
			data: { id:id},
			type: "POST",
			url: url,
			success: function (data) {

				 $.each(data, function(index, element) {
					$("#mt_titulo").val(element.titulo);
					$("#mt_descripcion").val(element.descripcion);
					$("#mt_proyecto").val(element.proyecto);
					$("#mt_ubicacion").val(element.ubicacion);
					$("#mt_tipologia").val(element.tipologia);
				});
				
				$('.cargando_ajax').fadeOut(200, function() {});
			},
			error: function(data) {
				console.log("ERROR");
			},

		}); //ajax
	}



	function cargar_videos_en_modal(id_proyecto){
		$(".cargando_ajax").fadeIn(200);
		$("#contenedor_videos").html("");
		
		var url = "<?php echo base_url(); ?>admin/Proyectos/VisualesProyecto";

		$.ajax({
			data: { id_proyecto:id_proyecto, tipo:3},
			type: "POST",
			url: url,
			dataType: 'json',
			success: function (data) {
				 $.each(data, function(index, element) {
					var destacada = 0;
					var checked = "";
					if(element.es_destacada == 1){
						destacada = 1;
						checked = 'checked="checked"';
					}

					var base_url = '<?php echo base_url(); ?>';

					contenido = '<div class="eo_video_thumb">';
					contenido += '<video  controls>';
					contenido += '<source src="'+base_url+element.path+'" type="video/mp4">';
					contenido += '</video>';
					contenido += '<a href="javascript:void(0);" class="clear_thumb_video btn btn-sm btn-danger">';
					contenido += 'Eliminar Video';
					contenido += '</a>';
					contenido += '<input type="hidden" name="eo_borrar_video[]" class="eo_borrar_video" value="0">';
					contenido += '<input type="hidden" name="eo_video_actual[]" class="eo_video_actual" value="'+element.path+'">';
				
					contenido += '</div>';

					$("#contenedor_videos").append(contenido);

				});
				
				$('.cargando_ajax').fadeOut(200, function() {}); //oculta animacion cargando
			},
			
			error: function(data) {
				console.log("ERROR");
			},

		}); //ajax
	} //cargar_videos_en_modal

	
	<?php //Boton para eliminar imagen ?>
	$(document).on("click", '.clear_thumb_image', function(event) { 
		$(this).parent(".eo_image_thumb").fadeOut();
		$(this).siblings(".eo_foto").delay(400).fadeIn();
		$(this).siblings(".eo_borrar_foto").val(1);
		$(this).hide();
	});

	<?php //Boton para eliminar video ?>
	$(document).on("click", '.clear_thumb_video', function(event) { 
		$(this).parent(".eo_video_thumb").fadeOut();
		$(this).siblings(".eo_borrar_video").val(1);
		$(this).hide();
	});


	$('#dataTable').DataTable({
		info: false,
		paging: true,
		"pageLength": 15,
		dom: 'Bfrtip',
		buttons: [
		{
			extend: 'excel',
			text: 'Excel <i class="fas fa-file-download"></i>',
			className: 'btn btn-animated btn-excel btn-sm btn-datatable',
			titleAttr: 'Exportar a Excel',
		},{
			extend: 'pdf',
			text: 'PDF <i class="fas fa-file-download"></i>',
			className: 'btn btn-animated btn-pdf btn-sm btn-datatable',
			titleAttr: 'Exportar a PDF',
		},{
			extend: 'copy',
			text: 'Copiar <i class="fas fa-copy"></i>',
			className: 'btn btn-animated btn-copiar btn-sm btn-datatable',
			titleAttr: 'Copiar al portapapeles',
		},{
			extend: 'print',
			text: 'Imprimir <i class="fas fa-print"></i>',
			className: 'btn btn-animated btn-imprimir btn-sm btn-datatable',
			titleAttr: 'Imprimir',
		}
		],
		
		"language": {
			"emptyTable": "No hay registros",
			"zeroRecords": "No hay registros",
			"info": "Página _PAGE_ de _PAGES_",
			"infoEmpty": "No hay registros",
			"lengthMenu":     "Mostrando _MENU_ registros",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"search":"Filtrar:",
			buttons: {
			copyTitle: 'Copiado al portapaples',
			copySuccess: {
				_: '%d líneas copiadas',
				1: '1 línes copiada'
				}
			}
		}
	});


	$('.editor').trumbowyg({
		btns: [
			['viewHTML'],
			['strong', 'em'],
		],
		autogrow: true,
	});

    	
</script>
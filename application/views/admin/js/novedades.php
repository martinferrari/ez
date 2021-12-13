<script>

$(".acciones").on('click', function(){
		var accion = $(this).data("accion");
		var id = $(this).parent().siblings(".id").val();
		var titulo = $(this).parent().siblings(".titulo").val();
		var descripcion = $(this).parent().siblings(".descripcion").val();
		var categoria = $(this).parent().siblings(".categoria").val();
		var estado = $(this).parent().siblings(".estado").val();

		if(accion == "detalle"){
			$("input[name=en_id]").val(id);
			$("input[name=en_titulo]").val(titulo);
			$("textarea[name=en_descripcion]").val(descripcion);
			$("select[name=en_categoria]").val(categoria);
			$("select[name=en_estado]").val(estado);
		
			$("#btn_borrar").attr("href", "<?php echo base_url(); ?>admin/Novedades/borrar_novedad/"+parseInt(id));

			
		} //detalle	

		if(accion == "imagenes"){
			$("#mei_id").val(id);
			cargar_fotos_en_modal(id);
		}
		if(accion == "videos"){
			$("#mev_id").val(id);
			cargar_videos_en_modal(id);
		}
		
	});


	function cargar_fotos_en_modal(id_novedad){
		//$(".cargando_ajax").fadeIn(200);
		$("#contenedor_fotos").html("");
		
		var url = "<?php echo base_url(); ?>admin/Novedades/VisualesNovedad";

		$.ajax({
			data: { id_novedad:id_novedad, tipo:1},
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

					contenido = '<div class="eo_image_thumb">';
					contenido += "<img src='<?php echo base_url(); ?>"+element.path+"'>";
					contenido += '<a href="javascript:void(0);" class="clear_thumb_image btn btn-sm btn-danger">';
					contenido += 'Eliminar Imagen';
					contenido += '</a>';
					contenido += '<input type="hidden" name="en_borrar_foto[]" class="en_borrar_foto" value="0">';
					contenido += '<input type="hidden" name="en_foto_actual[]" class="en_foto_actual" value="'+element.path+'">';
					contenido += '<label class="destacada"><input type="radio" name="en_foto_destacada" value="'+element.path+'" '+checked+'>Es la imagen destacada<label>';
					contenido += '</div>';

					
					$("#contenedor_fotos").append(contenido);

				});
				
				$('.cargando_ajax').fadeOut(200, function() {}); //oculta animacion cargando
			},
			
			//Funcion que se ejecuta si el request da error. (Opcional)
			error: function(data) {
				console.log("ERROR");
				console.log(data);
			},

		}); //ajax
	} //cargar_fotos_en_modal


	function cargar_videos_en_modal(id_novedad){
		//$(".cargando_ajax").fadeIn(200);
		$("#contenedor_videos").html("");
		
		var url = "<?php echo base_url(); ?>admin/Novedades/VisualesNovedad";

		$.ajax({
			data: { id_novedad:id_novedad, tipo:3},
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
					contenido += '<input type="hidden" name="en_borrar_video[]" class="en_borrar_video" value="0">';
					contenido += '<input type="hidden" name="en_video_actual[]" class="en_video_actual" value="'+element.path+'">';
				
					contenido += '</div>';

					
					$("#contenedor_videos").append(contenido);

				});
				
				$('.cargando_ajax').fadeOut(200, function() {}); //oculta animacion cargando
			},
			
			//Funcion que se ejecuta si el request da error. (Opcional)
			error: function(data) {
				console.log("ERROR");
			},

		}); //ajax
	} //cargar_videos_en_modal


	<?php //Boton para eliminar imagen ?>
	$(document).on("click", '.clear_thumb_image', function(event) { 
		$(this).parent(".eo_image_thumb").fadeOut();
		$(this).siblings(".en_foto").delay(400).fadeIn();
		$(this).siblings(".en_borrar_foto").val(1);
		$(this).hide();
	});

	<?php //Boton para eliminar video ?>
	$(document).on("click", '.clear_thumb_video', function(event) { 
		$(this).parent(".eo_video_thumb").fadeOut();
		$(this).siblings(".en_borrar_video").val(1);
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
	

	
</script>
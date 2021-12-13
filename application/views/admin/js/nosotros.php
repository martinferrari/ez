<script>

$(".acciones").on('click', function(){
		var accion = $(this).data("accion");
		var id = $(this).parent().siblings(".id").val();
		var nombre = $(this).parent().siblings(".nombre").val();
		var apellido = $(this).parent().siblings(".apellido").val();
		var cargo = $(this).parent().siblings(".cargo").val();
		var estado = $(this).parent().siblings(".estado").val();

		if(accion == "detalle"){
			$("input[name=en_id]").val(id);
			$("input[name=en_nombre]").val(nombre);
			$("input[name=en_apellido]").val(apellido);
			$("input[name=en_cargo]").val(cargo);
			$("select[name=en_estado]").val(estado);
            
			$("#btn_borrar").attr("href", "<?php echo base_url(); ?>admin/Nosotros/borrar_nosotros/"+parseInt(id));
			
		} //detalle	

		if(accion == "imagenes"){
			$("#mei_id").val(id);
			cargar_fotos_en_modal(id);
		}
		
		
	});


	function cargar_fotos_en_modal(id_nosotros){
		//$(".cargando_ajax").fadeIn(200);
		$("#contenedor_fotos").html("");
		
		var url = "<?php echo base_url(); ?>admin/nosotros/VisualesNosotros";

		$.ajax({
			data: { id_nosotros:id_nosotros, tipo:4},
			type: "POST",
			url: url,
			dataType: 'json',
			success: function (data) {
				console.log(data);

				
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
					contenido += '<input type="hidden" name="eo_borrar_foto[]" class="eo_borrar_foto" value="0">';
					contenido += '<input type="hidden" name="eo_foto_actual[]" class="eo_foto_actual" value="'+element.path+'">';
					// contenido += '<label class="destacada"><input type="radio" name="eo_foto_destacada" value="'+element.path+'" '+checked+'>Es la imagen destacada<label>';
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


	<?php //Boton para eliminar imagen ?>
	$(document).on("click", '.clear_thumb_image', function(event) { 
		$(this).parent(".eo_image_thumb").fadeOut();
		$(this).siblings(".eo_foto").delay(400).fadeIn();
		$(this).siblings(".eo_borrar_foto").val(1);
		$(this).hide();
		$('#lbl_mei_imagenes').show();
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
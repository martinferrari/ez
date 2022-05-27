<script>
	
	$(".acciones").on('click', function(){
        var accion = $(this).data("accion");

        var string_json = $(this).parent().siblings(".datos").val();
        const datos = JSON.parse(string_json)
        

        if(accion == "detalle"){
            jQuery.each(datos, function(i, val) {
                $("#mp_"+i).val( val );
            });
            $("#btn_borrar").attr("href", "<?php echo base_url(); ?>admin/shop/murvi/borrar/"+parseInt(datos.id));
		}


        if(accion == "imagenes"){
			$("#mei_id").val(datos.id);
			cargar_fotos_en_modal(datos.id);
		}
    });



    function cargar_fotos_en_modal(id){
		$(".cargando_ajax").fadeIn(200);
		$("#contenedor_fotos").html("");
		
		var url = "<?php echo base_url(); ?>admin/shop/murvi/visuales";

		$.ajax({
			data: { id:id},
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
					contenido += "Orden: <input type='text' class='form-control orden' value='"+element.orden+"' name='orden[]'>";
					contenido += '<a href="javascript:void(0);" class="clear_thumb_image btn btn-sm btn-danger">';
					contenido += 'Eliminar Imagen';
					contenido += '</a>';
					contenido += '<input type="hidden" name="eo_borrar_foto[]" class="eo_borrar_foto" value="0">';
					contenido += '<input type="hidden" name="eo_foto_actual[]" class="eo_foto_actual" value="'+element.path+'">';
					contenido += '<input type="hidden" name="eo_id_foto[]" class="eo_id_foto" value="'+element.id+'">';
					contenido += '<label class="destacada"><input type="radio" name="eo_foto_destacada" value="'+element.path+'" '+checked+'>Es la imagen destacada<label>';
					contenido += '</div>';

					
					$("#contenedor_fotos").append(contenido);

				});
				
				$('.cargando_ajax').fadeOut(200, function() {});
			},
			
			error: function(data) {
			},

		}); //ajax
	} //cargar_fotos_en_modal

    <?php //Boton para eliminar imagen ?>
	$(document).on("click", '.clear_thumb_image', function(event) { 
		$(this).parent(".eo_image_thumb").fadeOut();
		$(this).siblings(".eo_foto").delay(400).fadeIn();
		$(this).siblings(".eo_borrar_foto").val(1);
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
<script>

$(".acciones").on('click', function(){
        var accion = $(this).data("accion");

        var string_json = $(this).parent().siblings(".datos").val();
        const datos = JSON.parse(string_json)
        

        if(accion == "detalle"){
            jQuery.each(datos, function(i, val) {
                $("#ec_"+i).val( val );
            });
            $("#btn_borrar").attr("href", "<?php echo base_url(); ?>admin/borrar_cotizacion/"+parseInt(datos.id));

            cargar_detalle(parseInt(datos.id));
		}

    });



    function cargar_detalle(id){
		$(".cargando_ajax").fadeIn(200);
		
		var url = "<?php echo base_url(); ?>admin/detalle_cotizaciones";
		$("#modalEdicion #detalle").html('');
		
		$.ajax({
			data: { id:id},
			type: "POST",
			url: url,
			success: function (data) {
                contenido = '';

				 $.each(data, function(index, element) {
                    contenido += '<div class="col-md-2">';
                    contenido += '<h4>#</h4>';
                    contenido += '<input type="text" class="form-control form-control-sm" name="id_detalle[]" value="'+element.id+'" readonly>';
                    contenido += '</div>';
                    
                    contenido += '<div class="col-md-4">';
                    contenido += '<h4>Producto</h4>';
                    contenido += '<input type="text" class="form-control form-control-sm" name="producto[]" value="'+element.codigo+'" readonly>';
                    contenido += '</div>';

                    contenido += '<div class="col-md-3">';
                    contenido += '<h4>Cantidad</h4>';
                    contenido += '<input type="text" class="form-control form-control-sm" name="cantidad[]" value="'+element.cantidad+'" readonly>';
                    contenido += '</div>';

                    contenido += '<div class="col-md-3">';
                    contenido += '<h4>Unidad</h4>';
                    contenido += '<input type="text" class="form-control form-control-sm" name="unidad[]" value="'+element.unidad+'" readonly>';
                    contenido += '</div>';

                    contenido += '<div class="col-md-4">';
                    contenido += '<h4>Cantidad Cotizada</h4>';
                    contenido += '<input type="text" class="form-control form-control-sm" name="cantidad_cotizada[]" value="'+element.cantidad_cotizada+'">';
                    contenido += '</div>';

                    contenido += '<div class="col-md-4">';
                    contenido += '<h4>Unidad Cotizada</h4>';
                    contenido += '<select class="form-control form-control-sm" name="unidad_cotizada[]">';

                    if(element.unidad_cotizada == "m2"){
                        contenido += '<option value="m2" selected>m2</option>';
                        contenido += '<option value="ml">ml</option>';
                    }else{
                        contenido += '<option value="m2">m2</option>';
                        contenido += '<option value="ml" selected>ml</option>';
                    }
                    
                    contenido += '</select>';
                    contenido += '</div>';

                    contenido += '<div class="col-md-4">';
                    contenido += '<h4>Precio Cotizado</h4>';
                    contenido += '<input type="text" class="form-control form-control-sm" name="precio_cotizado[]" value="'+element.precio_cotizado+'">';
                    contenido += '</div>';

                    contenido += '<div class="col-md-12"><hr></div>';

				});

				$("#modalEdicion #detalle").append(contenido);
				$('.cargando_ajax').fadeOut(200, function() {});
			},
			error: function(data) {
				console.log("ERROR");
			},

		}); //ajax
	}



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
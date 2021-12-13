<script>

$(".acciones").on('click', function(){
		var accion = $(this).data("accion");
		var id = $(this).parent().siblings(".id").val();
		var nombre = $(this).parent().siblings(".nombre").val();
		var telefono = $(this).parent().siblings(".telefono").val();
		var profesion = $(this).parent().siblings(".profesion").val();
		var email = $(this).parent().siblings(".email").val();
        var direccion = $(this).parent().siblings(".direccion").val();
        var medidas = $(this).parent().siblings(".medidas").val();
        var motivo = $(this).parent().siblings(".motivo").val();
        var mensaje = $(this).parent().siblings(".mensaje").val();

		if(accion == "detalle_entrevista"){
			$("#modalDetalleEntrevista #nombre").html(nombre);
			$("#modalDetalleEntrevista #telefono").html(telefono);
            $("#modalDetalleEntrevista #profesion").html(profesion);
            $("#modalDetalleEntrevista #email").html(email);
            $("#modalDetalleEntrevista #direccion").html(direccion);
            $("#modalDetalleEntrevista #medidas").html(medidas);
            $("#modalDetalleEntrevista #motivo").html(motivo);
            $("#modalDetalleEntrevista #mensaje").html(mensaje);
		} //detalle	


		
		
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
<script>

$(".acciones").on('click', function(){
		var accion = $(this).data("accion");
		var id = $(this).parent().siblings(".id").val();
		var nombre = $(this).parent().siblings(".nombre").val();
		var dni = $(this).parent().siblings(".dni").val();
		var fecha_nac = $(this).parent().siblings(".fecha_nac").val();
		var lugar_nac = $(this).parent().siblings(".lugar_nac").val();
		var direccion = $(this).parent().siblings(".direccion").val();
		var estado_civil = $(this).parent().siblings(".estado_civil").val();
		var hijos = $(this).parent().siblings(".hijos").val();
		var telefono = $(this).parent().siblings(".telefono").val();
		var profesion = $(this).parent().siblings(".profesion").val();
		var entidad_titulo = $(this).parent().siblings(".entidad_titulo").val();
		var email = $(this).parent().siblings(".email").val();
		var primer_trabajo = $(this).parent().siblings(".primer_trabajo").val();
		var trabajo_anterior = $(this).parent().siblings(".trabajo_anterior").val();
		var posee_titulo_uni = $(this).parent().siblings(".posee_titulo_uni").val();
		var posee_matricula = $(this).parent().siblings(".posee_matricula").val();
		var posee_movilidad = $(this).parent().siblings(".posee_movilidad").val();
		var posee_lic_conducir = $(this).parent().siblings(".posee_lic_conducir").val();
		var tipo_medio = $(this).parent().siblings(".tipo_medio").val();
		var tipo_licencia = $(this).parent().siblings(".tipo_licencia").val();
		var dispo_horaria = $(this).parent().siblings(".dispo_horaria").val();
		var conoce_estudio = $(this).parent().siblings(".conoce_estudio").val();
		var conoce_obras = $(this).parent().siblings(".conoce_obras").val();
		var obra_ident = $(this).parent().siblings(".obra_ident").val();
		var como_informo_vacante = $(this).parent().siblings(".como_informo_vacante").val();
		var sigue_face = $(this).parent().siblings(".sigue_face").val();
		var sigue_insta = $(this).parent().siblings(".sigue_insta").val();
		var face = $(this).parent().siblings(".face").val();
		var insta = $(this).parent().siblings(".insta").val();

		if(posee_titulo_uni == "SI"){
			posee_titulo_uni = '<i class="fas fa-check-circle green"></i>';
		}else{
			posee_titulo_uni = '<i class="fas fa-times-circle red"></i>';
		}
		if(primer_trabajo == "SI"){
			primer_trabajo = '<i class="fas fa-check-circle green"></i>';
		}else{
			primer_trabajo = '<i class="fas fa-times-circle red"></i>';
		}
		if(posee_matricula == "SI"){
			posee_matricula = '<i class="fas fa-check-circle green"></i>';
		}else{
			posee_matricula = '<i class="fas fa-times-circle red"></i>';
		}
		if(posee_movilidad == "SI"){
			posee_movilidad = '<i class="fas fa-check-circle green"></i>';
		}else{
			posee_movilidad = '<i class="fas fa-times-circle red"></i>';
		}
		if(posee_lic_conducir == "SI"){
			posee_lic_conducir = '<i class="fas fa-check-circle green"></i>';
		}else{
			posee_lic_conducir = '<i class="fas fa-times-circle red"></i>';
		}
		if(conoce_estudio == "SI"){
			conoce_estudio = '<i class="fas fa-check-circle green"></i>';
		}else{
			conoce_estudio = '<i class="fas fa-times-circle red"></i>';
		}
		if(conoce_obras == "SI"){
			conoce_obras = '<i class="fas fa-check-circle green"></i>';
		}else{
			conoce_obras = '<i class="fas fa-times-circle red"></i>';
		}
		if(sigue_face == "SI"){
			sigue_face = '<i class="fas fa-check-circle green"></i>';
		}else{
			sigue_face = '<i class="fas fa-times-circle red"></i>';
		}
		if(sigue_insta == "SI"){
			sigue_insta = '<i class="fas fa-check-circle green"></i>';
		}else{
			sigue_insta = '<i class="fas fa-times-circle red"></i>';
		}
		

		if(accion == "detalle"){
			$("#modalDetalle #nombre").html(nombre);
			$("#modalDetalle #dni").html(dni);
			$("#modalDetalle #fecha_nac").html(fecha_nac);
			$("#modalDetalle #lugar_nac").html(lugar_nac);
			$("#modalDetalle #direccion").html(direccion);
			$("#modalDetalle #estado_civil").html(estado_civil);
			$("#modalDetalle #hijos").html(hijos);
			$("#modalDetalle #telefono").html(telefono);
			$("#modalDetalle #profesion").html(profesion);
			$("#modalDetalle #entidad_titulo").html(entidad_titulo);
			$("#modalDetalle #email").html(email);
			$("#modalDetalle #primer_trabajo").html(primer_trabajo);
			$("#modalDetalle #trabajo_anterior").html(trabajo_anterior);
			$("#modalDetalle #posee_titulo_uni").html(posee_titulo_uni);
			$("#modalDetalle #posee_matricula").html(posee_matricula);
			$("#modalDetalle #posee_movilidad").html(posee_movilidad);
			$("#modalDetalle #posee_lic_conducir").html(posee_lic_conducir);
			$("#modalDetalle #tipo_medio").html(tipo_medio);
			$("#modalDetalle #tipo_licencia").html(tipo_licencia);
			$("#modalDetalle #dispo_horaria").html(dispo_horaria);
			$("#modalDetalle #conoce_estudio").html(conoce_estudio);
			$("#modalDetalle #conoce_obras").html(conoce_obras);
			$("#modalDetalle #obra_ident").html(obra_ident);
			$("#modalDetalle #como_informo_vacante").html(como_informo_vacante);
			$("#modalDetalle #sigue_face").html(sigue_face);
			$("#modalDetalle #sigue_insta").html(sigue_insta);
			$("#modalDetalle #face").html(face);
			$("#modalDetalle #insta").html(insta);

			
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
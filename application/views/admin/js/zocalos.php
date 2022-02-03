<script>
	
	$(".acciones").on('click', function(){
		var seccion = $(this).data("seccion");
        $("#modalZocalo #mz_seccion").val(seccion);
        $("#modalZocalo .modal-title span").html(seccion);
        
    });

</script>
	
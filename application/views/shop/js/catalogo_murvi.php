<script>

    $('.productos').on("click", function(){
        contar_seleccionados();
    });


    $(".btn_solicitar_cotizacion").on("click", function(){
        $("#mc_productos_seleccionados").html("");
        
        let wa = "";
        $('.productos').each(function () {
            
            if ($(this).is(':checked')) {
                contenido = '<div class="detalle_cotizacion">';
                contenido += "<img src='<?php echo base_url(); ?>"+$(this).data("img")+"'>";
                contenido += "<span>"+$(this).data("codigo")+"</span>";
                contenido += "<input type='hidden' name='productos[]' value='"+$(this).data("codigo")+"'>";
                contenido += '</div>';

                $("#mc_productos_seleccionados").append(contenido);
                wa += $(this).data("codigo")+",";
                $("#wa_productos").val(wa);
                
            }
     
        });
        
    });

    $("#inputName").keyup(function() {
        let productos = $("#wa_productos").val();
        let nombre = $("#inputName").val();
        if(nombre != ""){
        $("#btn_wa").attr("href","https://api.whatsapp.com/send?phone=<?php echo NUMERO_WHATSAPP; ?>&text=Hola, mi nombre es "+nombre+" y quiero solicitar presupuesto de los Mosaicos Murvi: "+productos);
        $("#btn_wa").attr("target","_blank");
        }
    });


    function contar_seleccionados(){
        var numberOfChecked = $('input:checkbox:checked').length;
        $(".qty_productos_seleccionados").html(numberOfChecked);
    }

</script>
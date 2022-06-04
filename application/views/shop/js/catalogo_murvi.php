<script>

    $('.productos').on("click", function(){
        contar_seleccionados();
    });


    $(".btn_solicitar_cotizacion").on("click", function(){
        $("#mc_productos_seleccionados").html("");
        
        let wa = "";
        $('.productos').each(function () {
            
            if ($(this).is(':checked')) {

                let cantidad = $(this).parent().siblings(".cantidad_producto").val();
                let unidad = $(this).parent().siblings(".unidad_producto").val();

                if(cantidad > 0){
                    contenido = '<div class="detalle_cotizacion">';
                    contenido += "<img src='<?php echo base_url(); ?>"+$(this).data("img")+"'>";
                    contenido += "<span>"+$(this).data("codigo")+"</span>";
                    contenido += "<span> - Cantidad: "+cantidad+"</span>";
                    contenido += "<span> "+unidad+"</span>";
                    contenido += "<input type='hidden' name='id[]' value='"+$(this).data("id")+"'>";
                    contenido += "<input type='hidden' name='productos[]' value='"+$(this).data("codigo")+"'>";
                    contenido += "<input type='hidden' name='cantidad[]' value='"+cantidad+"'>";
                    contenido += "<input type='hidden' name='unidad[]' value='"+unidad+"'>";
                    contenido += '</div>';

                    $("#mc_productos_seleccionados").append(contenido);

                    wa += $(this).data("codigo")+" "+cantidad+" "+unidad+", ";
                    $("#wa_productos").val(wa);
                }
            }
        });
        
    });

    $("#btn_cotizacion_email").on("click", function(e){
        e.preventDefault();

        let nombre = $("#inputName").val();
        if(nombre == ""){
            alert("Ingrese nombre, apellido, telefono y email");
        }else{
            $("#form_cotizacion").submit();
        }
    });


    $("#btn_wa").on("click", function(){
        let nombre = $("#inputName").val();
        if(nombre == ""){
            alert("Ingrese nombre, apellido, telefono y email");
        }else{
            let productos = $("#wa_productos").val();
            $("#btn_wa").attr("href","https://api.whatsapp.com/send?phone=<?php echo NUMERO_WHATSAPP; ?>&text=Hola, mi nombre es "+nombre+" y quiero solicitar presupuesto de los Mosaicos Murvi: "+productos);
            $("#btn_wa").attr("target","_blank");
            $("#form_cotizacion").submit();
            $("#btn_wa").click();
        }
    });


    function contar_seleccionados(){
        var numberOfChecked = $('input:checkbox:checked').length;
        $(".qty_productos_seleccionados").html(numberOfChecked);
    }

</script>
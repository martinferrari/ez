<script>

//carga mas posts

    //al cargar la pagina, se traen 50 posts pero solo se muestran algunos. al presionar ver mas, se cargan las imagenes de los posts nuevos a mostrar y se muestran los posts
    //en vez de cargar mas posts, carga las imagenes de mas post
    $("#btn_ver_mas").on("click", function(){
        var desde = $("#desde").val();
        var hasta = parseInt(desde) + 4;

        for(var i=0; i<4; i++){
            $("#numero_"+desde+" img").attr('src', $("#numero_"+desde).data("imagen") );
            $("#numero_"+desde).show();
            desde++;
        }
        
        $("#desde").val(parseInt(desde));
        grid_gallery();

        var cantidad_de_posts_publicados = <?php echo $cantidad_de_posts_publicados; ?>;
        if(hasta >= cantidad_de_posts_publicados){
            $("#btn_ver_mas").hide();
        }

    });




    function grid_gallery() {
            var altura_item = 0;

            const cuadrado_der = [4,8,12,16,20,24,28,32,36,40,44,48,52,56,60,64,68,72,76,80,84,88,92,96,100];
            const cuadrado_izq = [5,9,13,17,21,25,29,33,41,45,49,53,57,61,65,69,73,77,81,85,89,93,97,101];
            const rect_der = [2,6,10,14,18,22,26,30,34,38,42,46,50,54,58,62,66,70,74,78,82,86,90,94,98,102];
            const rect_izq = [3,7,11,15,19,23,27,31,35,39,43,47,51,55,59,63,67,71,75,79,83,87,91,95,99,103];
            
            var nuevo = 1;

            //misma altura para todos
            var altura_para_todos = $("#numero_1").height();

            jQuery('.grid-item').each(function () {

                if(nuevo == 3){
                    nuevo = 1;
                }

                var this_col = Number(jQuery(this).parent().attr('data-col'));
                var this_gridspace = Number(jQuery(this).parent().attr('data-gridspace'));
                var this_ratio = eval($(this).parent().attr('data-ratio'));
                jQuery(this).parent().css('padding-left', this_gridspace);
                var w = (($(document).width() - (this_gridspace * this_col + 1)) / this_col) - (this_gridspace / this_col);
                var gi = $(this);
                var h = w * this_ratio;
                
                altura_item = h;

                gi.css('width', w);
                gi.css('height', h);
                gi.find(".pf_title").css('margin-top', (h / 2) - 10);
                gi.css('margin-right', this_gridspace);
                gi.css('margin-bottom', this_gridspace);
                if (gi.hasClass('large')) {
                    $(this).css('width', (w * 2) + this_gridspace);
                    $(this).css('height', (h * 2) + this_gridspace);
                }
                if (gi.hasClass('large-width')) {
                    $(this).css('width', (w * 2) + this_gridspace);
                    $(this).css('height', h);
                }
                if (gi.hasClass('large-height')) {
                    $(this).css('height', (h * 2) + this_gridspace);
                    gi.find(".pf_title").css('margin-top', (h) - 20);
                }

                /*posicion*/
                var numero = $(this).data("numero");
                if( cuadrado_der.includes(numero) ){
                    var position = $("#numero_4").position();
                    $(this).css("left",position.left+"px");
                }
                if( cuadrado_izq.includes(numero) ){
                    var position = $("#numero_1").position();
                    $(this).css("left",position.left+"px");
                }
                if( rect_der.includes(numero) ){
                    var position = $("#numero_2").position();
                    $(this).css("left",position.left+"px");
                }
                if( rect_izq.includes(numero) ){
                    var position = $("#numero_3").position();
                    $(this).css("left",position.left+"px");
                }

                <?php //solo para los posts agregados ?>
                if(numero > 4){ 
                    
                    if(nuevo == 1){
                        var numero_id = numero-1;
                        var position = $("#numero_"+numero_id).position();
                    }else{
                        var numero_id = numero-2;
                        var position = $("#numero_"+numero_id).position();
                    }

                    posicion_top = position.top + altura_item;
                    posicion_top = posicion_top + 10;
                    $(this).css("top",posicion_top+"px");

                }
                nuevo++;
            });
            var altura = $( ".grid" ).height();
            var cantidad_para_agregar = $("#desde").data("cantidad_para_agregar");
            cantidad_para_agregar = cantidad_para_agregar/2;
            altura = altura + (altura_item * cantidad_para_agregar);
            $(".grid").css("height",altura+"px");

            var margin_top = parseInt($("#container_btn").css('marginTop'));
            margin_top = margin_top + 20;
            $("#container_btn").css("margin-top",margin_top+"px");
            


        }

</script>
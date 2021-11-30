function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var nombre = $('#inputName').val();
    var telefono = $('#inputTelefono').val();
    var celular = $('#Celular').val();
    var profesion = $('#inputProfesion').val();
    var email = $('#inputEmail').val();
    var direccion = $('#inputDireccion').val();
    var medidas = $('#inputMedidas').val();
    var motivo = $('#Motivo').val();
    var mensaje = $('#inputMessage').val();
    var conocio = $('#conocio').val();
    if(nombre.trim() == '' ){
        alert('Por favor ingresa un Nombre.');
        $('#inputName').focus();
        return false;
    }else if(telefono.trim() == '' ){
        alert('Por favor ingresa un Telefono.');
        $('#inputTelefono').focus();
        return false;
    }else if(profesion.trim() == '' ){
        alert('Por favor ingresa profesion.');
        $('#inputProfesion').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Ingresa un Email Valido.');
        $('#inputEmail').focus();
        return false;
    }else if(direccion.trim() == '' ){
        alert('Por favor ingresa Direccion.');
        $('#inputDireccion').focus();
        return false;
    }else if(mensaje.trim() == '' ){
        alert('Por favor Ingresa una Breve Descripcion.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_entrevista.php',
            data:'contactFrmSubmit=1&Nombre='+nombre+'&Telefono='+telefono+'&Celular='+celular+'&Profesion='+profesion+'&email='+email+'&Direccion='+direccion+'&Medidas='+medidas+'&Motivo='+motivo+'&Descripcion='+mensaje+'&Nos Conocio por='+conocio,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputName').val('');
                    $('#inputTelefono').val('');
                    $('#inputProfesion').val('');
                    $('#inputEmail').val('');
                    $('#inputDireccion').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Gracias por contactarse.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Ocurrio un Problema, por favor intenta de nuevo.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}


function submitContactFormTrabajo(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+.)+[A-Z]{2,4}$/i;
    var nombre = $('#inputName').val();
    var telefono = $('#inputTelefono').val();
    var celular = $('#Celular').val();
    var profesion = $('#inputProfesion').val();
    var email = $('#inputEmail').val();
    var direccion = $('#inputDireccion').val();
    var medidas = $('#inputMedidas').val();
    var motivo = $('#Motivo').val();
    var mensaje = $('#inputMessage').val();
    var conocio = $('#conocio').val();
    if(nombre.trim() == '' ){
        alert('Por favor ingresa un Nombre.');
        $('#inputName').focus();
        return false;
    }else if(telefono.trim() == '' ){
        alert('Por favor ingresa un Telefono.');
        $('#inputTelefono').focus();
        return false;
    }else if(profesion.trim() == '' ){
        alert('Por favor ingresa profesion.');
        $('#inputProfesion').focus();
        return false;
    }else if(email.trim() != '' && !reg.test(email)){
        alert('Ingresa un Email Valido.');
        $('#inputEmail').focus();
        return false;
    }else if(direccion.trim() == '' ){
        alert('Por favor ingresa Direccion.');
        $('#inputDireccion').focus();
        return false;
    }else if(mensaje.trim() == '' ){
        alert('Por favor Ingresa una Breve Descripcion.');
        $('#inputMessage').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_entrevista.php',
            data:'contactFrmSubmit=1&Nombre='+nombre+'&Telefono='+telefono+'&Celular='+celular+'&Profesion='+profesion+'&email='+email+'&Direccion='+direccion+'&Medidas='+medidas+'&Motivo='+motivo+'&Descripcion='+mensaje+'&Nos Conocio por='+conocio,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    $('#inputNombre').val('');
                    $('#inputTelefono').val('');
                    $('#inputProfesion').val('');
                    $('#inputEmail').val('');
                    $('#inputDireccion').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Gracias por contactarse.</p>');
                }else{
                    $('.statusMsg').html('<span style="color:red;">Ocurrio un Problema, por favor intenta de nuevo.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
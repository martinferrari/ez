 $(document).ready(function(){
        $('#send_mensaje').click(function(e){
            
            //Stop form submission & check the validation
            e.preventDefault();
            
            // Variable declaration
            var error = false;
            var nombre = $('#nombre').val();
            var email = $('#email').val();
			var telefono = $('#telefono').val();
            var mensaje = $('#mensaje').val();
			
			$('#nombre,#email,#telefono,#mensaje').click(function(){
				$(this).removeClass("error_input");
			});
            
         	// Form field validation
            if(nombre.length == 0){
                var error = true;
                $('#nombre').addClass("error_input");
            }else{
                $('#nombre').removeClass("error_input");
            }
            if(email.length == 0 || email.indexOf('@') == '-1'){
                var error = true;
                $('#email').addClass("error_input");
            }else{
                $('#email').removeClass("error_input");
            }
			if(telefono.length == 0){
                var error = true;
                $('#telefono').addClass("error_input");
            }else{
                $('#telefono').removeClass("error_input");
            }
            if(mensaje.length == 0){
                var error = true;
                $('#mensaje').addClass("error_input");
            }else{
                $('#mensaje').removeClass("error_input");
            }
            
            // If there is no validation error, next to process the mail function
            if(error == false){
               // Disable submit button just after the form processed 1st time successfully.
                $('#send_mensaje').attr({'disabled' : 'true', 'value' : 'Enviando...' });
                
				/* Post Ajax function of jQuery to get all the data from the submission of the form as soon as the form sends the values to email.php*/
                $.post("formulario.php", $("#contact_form").serialize(),function(result){
                    //Check the result set from email.php file.
                    if(result == 'sent'){
                        //If the email is sent successfully, remove the submit button
                         $('#submit').remove();
                        //Display the success mensaje
                        $('#mail_success').fadeIn(500);
                    }else{
                        //Display the error mensaje
                        $('#mail_fail').fadeIn(500);
                        // Enable the submit button again
                        $('#send_mensaje').removeAttr('disabled').attr('value', 'Send The mensaje');
                    }
                });
            }
        });    
    });
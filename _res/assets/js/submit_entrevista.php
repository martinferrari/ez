<?php
if(isset($_POST['contactFrmSubmit']) && 
!empty($_POST['nombre']) &&
!empty($_POST['telefono']) &&
!empty($_POST['celular'])  &&
!empty($_POST['profesion']) &&
(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) &&
!empty($_POST['direccion'])
&& !empty($_POST['medidas'])
&& !empty($_POST['motivo'])
&& !empty($_POST['mensaje']) 
&& !empty($_POST['conocio'])){
    
    // Submitted form data
    $nombre   = $_POST['nombre'];
    $telefono  = $_POST['telefono'];
    $celular= $_POST['celular'];
    $profesion= $_POST['profesion'];
    $email= $_POST['email'];
    $direccion= $_POST['direccion'];
    $medidas = $_POST['medidas'];
    $motivo= $_POST['motivo'];
    $mensaje= $_POST['mensaje'];
    $conocio= $_POST['conocio'];
    
    /*
     * Send email to admin
     */
    $to     = 'mathias_fx@yahoo.com.ar';
    $subject= 'Entrevista desde la Web';
    
    $htmlContent = '
    <h4>Entrevista desde la Web.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Nombre:</th><td>'.$nombre.'</td>
        </tr>
        <tr>
            <th>Telefono:</th><td>'.$telefono.'</td>
        </tr>
        <tr>
        <th>Celular:</th><td>'.$celular.'</td>
        </tr>
        <tr>
        <th>Profesion:</th><td>'.$profesion.'</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Email:</th><td>'.$email.'</td>
        </tr>
        <tr>
        <th>Dirección:</th><td>'.$direccion.'</td>
        </tr>
        <tr>
        <th>Motivo:</th><td>'.$medidas.'</td>
        </tr>
        <tr>
        <tr>
        <th>Motivo:</th><td>'.$motivo.'</td>
        </tr>
        <tr>
            <th>Mensaje:</th><td>'.$mensaje.'</td>
        </tr>
        <tr>
        <th>¿Como nos Conocio?:</th><td>'.$conocio.'</td>
    </tr>
    </table>';
    
    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "rn";
    $headers .= "Content-type:text/html;charset=UTF-8" . "rn";
    
    // Additional headers
    $headers .= 'From: PaginaWeb<mathias_Fx@yahoo.com.ar>' . "rn";
    
    // Send email
    if(mail($to,$subject,$htmlContent,$headers)){
        $status = 'ok';
    }else{
        $status = 'ok';
    }
    
    // Output status
    echo $status;die;
}
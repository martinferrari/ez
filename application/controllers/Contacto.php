
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contacto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/contacto_model');
	}

    /**
     * Recibe los datos del formualrio de Entrevista
     */
    function entrevista(){
        $this->load->helper('ez_email_helper');

        $nombre = reg_expresion($this->input->post("inputName"));
        $telefono = reg_expresion($this->input->post("inputTelefono"));
        $profesion = reg_expresion($this->input->post("inputProfesion"));
        $email = reg_expresion($this->input->post("inputEmail"));
        $direccion = reg_expresion($this->input->post("inputDireccion"));
        $medidas = reg_expresion($this->input->post("inputMedidas"));
        $motivo = reg_expresion($this->input->post("Motivo"));
        $mensaje = reg_expresion($this->input->post("inputMessage"));
        $conocio = reg_expresion($this->input->post("conocio"));

        $data['titulo'] = 'Contacto - Entrevista';
        $data['mensaje'] = "El siguiente correo fue enviado por un usuario desde el formulario de Contacto/Entrevista.<br><br>";
        $data['mensaje'] .= '<b>Nombre</b>: '.$nombre."<br>";
        $data['mensaje'] .= '<b>Telefono</b>: '.$telefono."<br>";
        $data['mensaje'] .= '<b>Profesion</b>: '.$profesion."<br>";
        $data['mensaje'] .= '<b>Email</b>: '.$email."<br>";
        $data['mensaje'] .= '<b>Direccion</b>: '.$direccion."<br>";
        $data['mensaje'] .= '<b>Medidas</b>: '.$medidas."<br>";
        $data['mensaje'] .= '<b>Motivo</b>: '.$motivo."<br>";
        $data['mensaje'] .= '<b>Message</b>: '.$mensaje."<br>";
        $data['mensaje'] .= '<b>Conocio por:</b> '.$conocio."<br>";
		
        $enviar_mail = enviar_email($data); //ez_email_helper	
        $this->contacto_model->alta_entrevista($nombre,$telefono, $profesion, $email, $direccion, $medidas, $motivo, $mensaje, $conocio);

        redirect('contacto');
	
    } //entrevista


    /**
     * Recibe los datos del formualrio de Trabaja con nosotros
     */
    function trabaja(){
        $this->load->helper('ez_email_helper');

        
        $nombre = reg_expresion($this->input->post("inputName"));
        $dni = reg_expresion($this->input->post("inputDNI"));
        $fecha_nac = reg_expresion($this->input->post("inputDate"));
        $lugar_nac = reg_expresion($this->input->post("inputLugarNacimiento"));
        $direccion = reg_expresion($this->input->post("inputDireccion"));
        $estado_civil = reg_expresion($this->input->post("inputCivil"));
        $hijos = reg_expresion($this->input->post("inputHijos"));
        $telefono = reg_expresion($this->input->post("inputTelefono"));
        $profesion = reg_expresion($this->input->post("inputProfesion"));
        $entidad = reg_expresion($this->input->post("inputEntidad"));
        $email = reg_expresion($this->input->post("inputEmail"));
        $primer_trabajo = reg_expresion($this->input->post("primertrabajo"));
        $trabajo_ant = reg_expresion($this->input->post("inputTrabajoAnterior"));
        $posee_titulo_uni = reg_expresion($this->input->post("tituloOtorgado"));
        $posee_matricula = reg_expresion($this->input->post("matricula"));
        $posee_movilidad = reg_expresion($this->input->post("movilidad"));
        $posee_lic_conducir = reg_expresion($this->input->post("licencia"));
        $tipo_medio = reg_expresion($this->input->post("tipodemedio"));
        $tipo_licencia = reg_expresion($this->input->post("TipoLicencia"));
        $dispo_horaria = reg_expresion($this->input->post("DispoHoraria"));
        $conoce_estudio = reg_expresion($this->input->post("nosconoce"));
        $conoce_obras = reg_expresion($this->input->post("conoceobras"));
        $obra_ident = reg_expresion($this->input->post("obraidentificada"));
        $como_informo_vacante = reg_expresion($this->input->post("InformoVacante"));
        $sigue_face = reg_expresion($this->input->post("sigueFacebook"));
        $sigue_insta = reg_expresion($this->input->post("sigueInstagram"));
        $face = reg_expresion($this->input->post("inputIDfacebook"));
        $insta = reg_expresion($this->input->post("inputIDinstagram"));

       
        $data['titulo'] = 'Contacto - Trabaja con nosotros';
        $data['mensaje'] = "El siguiente correo fue enviado por un usuario desde el formulario de Contacto/Trabaja con nosotros.<br><br>";
        //datos personales
        $data['mensaje'] .= '<b>Nombre</b>: '.$nombre."<br>";
        $data['mensaje'] .= '<b>DNI</b>: '.$dni."<br>";
        $data['mensaje'] .= '<b>Fecha de Nacimiento</b>: '.$fecha_nac."<br>";
        $data['mensaje'] .= '<b>Lugar de Nacimiento</b>: '.$lugar_nac."<br>";
        $data['mensaje'] .= '<b>Direccion</b>: '.$direccion."<br>";
        $data['mensaje'] .= '<b>Estado Civil</b>: '.$estado_civil."<br>";
        $data['mensaje'] .= '<b>Hijos</b>: '.$hijos."<br>";
        $data['mensaje'] .= '<b>Telefono</b>: '.$telefono."<br>";
        $data['mensaje'] .= '<b>Profesion</b>: '.$profesion."<br>";
        $data['mensaje'] .= '<b>Entidad que otorga el titulo</b>: '.$entidad."<br>";
        $data['mensaje'] .= '<b>Email</b>: '.$email."<br>";
        //datos laborales
        $data['mensaje'] .= '<b>Primer trabajo</b>: '.$primer_trabajo."<br>";
        $data['mensaje'] .= '<b>Trabajo Anterior</b>: '.$trabajo_ant."<br>";
        $data['mensaje'] .= '<b>Posee Titulo Universitario Otorgado</b>: '.$posee_titulo_uni."<br>";
        $data['mensaje'] .= '<b>Posee matricula del Colegio de Arquitecos de Formosa vigente</b>: '.$posee_matricula."<br>";
        $data['mensaje'] .= '<b>Posee medio de movilidad</b>: '.$posee_movilidad."<br>";
        $data['mensaje'] .= '<b>Posee licencia de Conducir</b>: '.$posee_lic_conducir."<br>";
        $data['mensaje'] .= '<b>Tipo de Medio</b>: '.$tipo_medio."<br>";
        $data['mensaje'] .= '<b>Tipo de Licencia</b>: '.$tipo_licencia."<br>";
        //Disponibilidad horaria
        $data['mensaje'] .= '<b>Disponibilidad Horaria</b>: '.$dispo_horaria."<br>";
        $data['mensaje'] .= '<b>Conoce el estudio:</b> '.$conoce_estudio."<br>";
        $data['mensaje'] .= '<b>Conoce las Obras del Estudio:</b> '.$conoce_obras."<br>";
        $data['mensaje'] .= '<b>Obra identificada:</b> '.$obra_ident."<br>";
        $data['mensaje'] .= '<b>Como se informo de la Vacante:</b> '.$como_informo_vacante."<br>";
        $data['mensaje'] .= '<b>Sigue nuestra Fan Page de Facebook:</b> '.$sigue_face."<br>";
        $data['mensaje'] .= '<b>Sigue nuestra Fan Page de Instagram:</b> '.$sigue_insta."<br>";
        $data['mensaje'] .= '<b>Facebook:</b> '.$face."<br>";
        $data['mensaje'] .= '<b>Instagram:</b> '.$insta."<br>";
		
        $enviar_mail = enviar_email($data); //ez_email_helper
        
        $this->contacto_model->alta_trabaja($nombre, $dni,$fecha_nac, $lugar_nac,$direccion, $estado_civil, $hijos, $telefono, $profesion, $entidad, $email, $primer_trabajo, $trabajo_ant, $posee_titulo_uni, $posee_matricula, $posee_movilidad, $posee_lic_conducir, $tipo_medio, $tipo_licencia, $dispo_horaria, $conoce_estudio, $conoce_obras, $obra_ident, $como_informo_vacante, $sigue_face, $sigue_insta, $face, $insta);

        

        redirect('contacto');
	
    } //entrevista

}

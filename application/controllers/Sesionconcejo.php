<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SesionConcejo extends CI_Controller {

 
function __construct() {
        parent::__construct();
        $this->load->model('webservice/JsonSesiones');
    }

    public function regidores() {
        
        $data['sesiones'] = $this->JsonSesiones->sesiones();
        $this->load->view('webservice/sesionesConcejo/sesionesTodas', $data);
    }

    public function Eventos() {
        $data['evento'] = $this->JsonMSI->EventosWeb();
        $this->load->view('webservice/portalmsi/eventos', $data);
    }

}

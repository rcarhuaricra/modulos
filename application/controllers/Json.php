<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Json extends CI_Controller {

    public function Convocatorias($all = '') {
        $dato = $this->Jsonmsi->convocatoriasCasdetalle2($all);
        echo json_encode($dato);

        /* $data['convocatoria'] = $this->Jsonmsi->convocatoriasCas($all);
          $this->load->view('webservice/portalmsi/convocatorias', $data); */
    }

    public function Convocatorias_detalle($cas) {
        $datos['titulo'] = "Dettalle CAS Nº $cas";
        $this->load->view('template/head', $datos);
        $data['convocatoria'] = $this->Jsonmsi->convocatoriasCasdetalle($cas);
        if ($data['convocatoria'] == FALSE) {
            echo "Convocatoria No Encontrada";
        } else {

            $this->load->view('webservice/portalmsi/convocatoriaDetalle', $data);
        }
    }

    public function Convocatorias_detalle2($cas) {

        $data['convocatoria'] = $this->Jsonmsi->convocatoriasCasdetalle2($cas);
        //echo json_encode($data);
        //$this->load->view('webservice/portalmsi/convocatoriaDetalle', $data);
        $this->load->view('webservice/portalmsi/convocatorias', $data);
    }

    public function Noticias() {
        $data['noticia'] = $this->Jsonmsi->NoticiasWeb();
        $this->load->view('webservice/portalmsi/noticias', $data);
    }

    public function Eventos() {
        $data['evento'] = $this->Jsonmsi->EventosWeb();
        $this->load->view('webservice/portalmsi/eventos', $data);
    }

    public function Intranet() {
        echo $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='form-group alert alert-danger'>", "</div>");
        $this->form_validation->set_rules("id", 'ID', 'required');
        $this->form_validation->set_rules("url$id", 'URL', 'valid_url|required');
        echo $url = $this->input->post("url$id");
        if ($this->form_validation->run() === FALSE) {
            $datos['titulo'] = "Mantenimiento Banner Intranet";
            $this->load->view('template/head', $datos);
            $this->load->view('webservice/intranet/banner');
            $this->load->view('template/foot');
        } else {
            echo "correcto";
        }
    }

    public function banner($id) {
        $archivo = "./archivos/intranet/banner.txt";
        $abrir = fopen($archivo, 'r+');
        $contenido = fread($abrir, filesize($archivo));
        fclose($abrir);
// Separar linea por linea
        $contenido = explode("\n", $contenido);
// Modificar linea deseada ( 2 ) 
        $contenido[$id] = 'jajaja little monkey';
// Unir archivo
        $contenido = implode("\r", $contenido);
// Guardar Archivo
        $abrir = fopen($archivo, 'w');
        fwrite($abrir, $contenido);
        fclose($abrir);
    }

    public function eliminarbanner($id) {
        
    }

}

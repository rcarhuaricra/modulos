<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Intranet extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function banner() {
        echo $id = $this->input->post('id');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='form-group alert alert-danger'>", "</div>");
        $this->form_validation->set_rules("id", 'ID', 'required');
        $this->form_validation->set_rules("url$id", 'URL', 'valid_url|required');
        echo $url = $this->input->post("url$id");
        if ($this->form_validation->run() === FALSE) {
            $datos['titulo'] = "Mantenimiento Banner Intranet";
            $this->load->view('template/head', $datos);
            $this->load->view('webservice/intranet/listaBanner');
            $this->load->view('template/foot');
        } else {
            echo "correcto";
        }
    }

    public function index() {
        $datos['titulo'] = "Mantenimiento Banner Intranet";
        $this->load->view('template/head', $datos);
        $this->load->view('webservice/intranet/banner');
        $this->load->view('template/foot');
    }

    public function eliminarbanner($id) {
        $file = base_url() ."/archivos/intranet/banner.txt";
        $i = 0; //contador de línea que se está leyendo
        echo $numlinea = $id; //línea que se desea borrar
        $aux = array();
        // Abrimos el archivo
        $archivo = fopen($file, 'r');
        // Hacemos un ciclo y vamos recogiendo linea por linea del archivo.
        while ($linea = fgets($archivo)) {
            if ($i != $numlinea) {  // Si la linea que deseamos eliminar no es esta 
                $aux[] = $linea; // La agregamos a nuestra variable auxiliar
            }
            // Incrementamos nuestro contador de lineas
            $i++;
        }
        // Cerramos el archivo.
        fclose($archivo);
        // Convertimos el arreglo(array) en una cadena de texto (string) para guardarlo.
        $aux = implode($aux, '');
        // Reemplazamos el contenido del archivo con la cadena de texto (sin la linea eliminada)
        file_put_contents($file, $aux);
        //header("location:" . base_url() . "intranet/banner");
    }

    public function nuevoBanner() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("<div class='form-group alert alert-danger'>", "</div>");
        $this->form_validation->set_rules("url", 'URL', 'valid_url|required');
        if ($this->form_validation->run() === FALSE) {
            $datos['titulo'] = "Nuevo Banner Intranet";
            $this->load->view('template/head', $datos);
            $this->load->view('webservice/intranet/nuevoBanner');
        } else {
            echo $url = $this->input->post("url");
            $file = fopen(base_url() ."/archivos/intranet/banner.txt", "a+");
            fwrite($file, $url . PHP_EOL);
            fclose($file);
            header("location:" . base_url() . "intranet/banner");
        }
    }

}

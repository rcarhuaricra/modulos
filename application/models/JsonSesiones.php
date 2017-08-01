<?php

class JsonSesiones extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->database('indicadores');
    }

    public function verBD($tabla) {

        $sql = "SELECT * FROM $tabla";
        return $this->load->database('indicadores')->query($sql);
    }

}

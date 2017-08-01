<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Indicadores extends CI_Controller {

    public function __construct() {
        parent::__construct();
// Your own constructor code

        $this->load->model('IndicadorModel');
    }

    public function index($tabla) {
        echo $tabla . '<br>';
        $query['data'] = $this->IndicadorModel->verBD($tabla);
        $this->load->view('indicadores/table', $query);
        // print_r($query);
        
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sic extends CI_Controller {

    public function filtro() {
        $data['inicio'] = $this->input->post('inicio');
        $data['fin'] = $this->input->post('fin');
        $data['busqueda'] = $this->input->post('busqueda');
        $data['options']= array('TODOS','BTNDIRECCION', 'BTNLICENCIA', 'BTNCIIU');
        $datos['titulo'] = "Reporte de Busquedas en Sistema de Información Catastral";        
        $datos['dataTable'] = $this->load->view('template/datatable', '', TRUE);
        $datos['dataPicker'] = $this->load->view('template/datapicker', '', TRUE);
        $this->load->view('template/head', $datos);        
        $url = "http://167.249.10.28/Servicios/SicClick.svc/json/sicclick";
        $set = file_get_contents($url);
        $data['jsonButton'] = json_decode($set);
        $data['filtro1'] = 'proTxtBoton';
        $this->load->view('sic/filtros', $data);
        $this->load->view('template/foot');
    }
    public function busquedas(){
        $datos['titulo'] = "Reporte de Busquedas en Sistema de Información Catastral";        
        $datos['dataTable'] = $this->load->view('template/datatable', '', TRUE);
        //$datos['dataPicker'] = $this->load->view('template/datapicker', '', TRUE);
        $this->load->view('template/head', $datos);        
        $url = "http://167.249.10.28/Servicios/SicClick.svc/json/sicclicknro";
        $set = file_get_contents($url);
        $data['jsonButton'] = json_decode($set);
        $this->load->view('sic/busquedaTotal', $data);
        $this->load->view('template/foot');
    }


}

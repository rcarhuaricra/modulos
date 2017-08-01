<?php

class IndicadorModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function verBD($tabla) {
        $db = $this->load->database('indicadores', TRUE);
        echo $db['database'];
        $sql = "SELECT * FROM $tabla";
        //echo $sql . "<br>";
        $query = $db->query($sql);
        return $query->result();
    }

    public function cabeceras($tabla) {
        $nombre_base_datos = "test";
        $nombre_tabla = $tabla;

        $sql = "SELECT COLUMN_NAME
FROM information_schema.COLUMNS
WHERE TABLE_SCHEMA  LIKE '$nombre_base_datos'
    AND TABLE_NAME = '$nombre_tabla'";
    }

}

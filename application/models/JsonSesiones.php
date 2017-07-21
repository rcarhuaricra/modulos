<?php

class JsonSesiones extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
    }

    public function sesiones() {
        $msi = $this->load->database('sesiones_concejo', TRUE);
        $sql = "SELECT 
            B.`CONDICION_REUNION`
            , C.`FECHA_SESION`
            , CONCAT(D.`APE_PAT`,' ', D.`APE_MAT`,' ',D.`NOMBRES`) AS REGIDOR
            , D.`FOTO`
            , D.`PERIODO`
            , E.`TIPO_VOTACION`
            , F.`TXTTEMA`
            , G.`TXT_TIPOVOTACION`
            FROM `sc_asistencia_de_regidores` A
            INNER JOIN `sc_estado_de_asistencia` B ON B.`ID_CONDICION`=A.`ID_CONDICION`
            INNER JOIN `sc_fecha_de_sesiones` C ON C.`ID_FECHA_SESION`=A.`ID_FECHA_SESION`
            INNER JOIN `sc_lista_de_regidores` D ON D.`ID_REGIDOR`=A.`ID_REGIDOR`
            INNER JOIN `sc_votaciones` E ON E.`ID_ASISTENCIA`=A.`ID_ASISTENCIA`
            INNER JOIN `sc_tema_de_votacion` F ON F.`ID_TEMA`=E.`ID_TEMA`
            INNER JOIN `sc_tipo_de_votacion` G ON G.`ID_TIPOVOTACION`=E.`ID_TIPOVOTACION`
            WHERE D.`FLG_ESTADO`='1'";

        return $msi->query($sql);
    }

}

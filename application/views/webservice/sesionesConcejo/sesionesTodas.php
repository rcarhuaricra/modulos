<?php
$json = array();
foreach ($sesiones->result() as $fila) {
    $CONDICION_REUNION = $fila->CONDICION_REUNION;
    $FECHA_SESION = $fila->FECHA_SESION;
    $REGIDOR = $fila->REGIDOR;
    $FOTO = $fila->FOTO;
    $PERIODO = $fila->PERIODO;
    $TIPO_VOTACION = $fila->TIPO_VOTACION;
    $TXTTEMA = $fila->TXTTEMA;
    $TXT_TIPOVOTACION = $fila->TXT_TIPOVOTACION;
    $json [] = array(
        'CONDICION_REUNION' => $CONDICION_REUNION,
        'FECHA_SESION' => $FECHA_SESION,
        'REGIDOR' => $REGIDOR,
        'FOTO' => $FOTO,
        'PERIODO' => $PERIODO,
        'TIPO_VOTACION' => $TIPO_VOTACION,
        'TXTTEMA' => $TXTTEMA,
        'TXT_TIPOVOTACION' => $TXT_TIPOVOTACION
    );
}
echo json_encode($json);

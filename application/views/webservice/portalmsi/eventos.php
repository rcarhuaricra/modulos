<?php

$eventos = array();
$contar= count($evento->result());
foreach ($evento->result() as $fila) {

    $event_id = $fila->event_id;
    $guid = $fila->guid;
    $event_name = $fila->event_name;
    $event_start_date = $fila->event_start_date;
    $event_end_date = $fila->event_end_date;
    $event_start_time = $fila->event_start_time;
    $event_end_time = $fila->event_end_time;
    $post_content = $fila->post_content;
    $LUGAR = $fila->LUGAR;
    $DIRECCION = $fila->DIRECCION;
    $DISTRITO = $fila->DISTRITO;
    $PROVINCIA = $fila->PROVINCIA;

    $eventos [] = array(
        'event_id' => $event_id,
        'guid' => $guid,
        'event_name' => $event_name,
        'event_start_date' => $event_start_date,
        'event_end_date' => $event_end_date,
        'event_start_time' => $event_start_time,
        'event_end_time' => $event_end_time,
        'post_content' => $post_content,
        'LUGAR' => $LUGAR,
        'DIRECCION' => $DIRECCION,
        'DISTRITO' => $DISTRITO,
        'PROVINCIA' => $PROVINCIA,
        'CANTIDAD' => $contar
    );
}
echo json_encode($eventos);

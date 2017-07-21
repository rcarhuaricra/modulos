<?php

$convocatorias = array();
foreach ($convocatoria->result() as $fila1) {
    $codigo = $fila1->codigo;
    $descripcion = $fila1->descripcion;
    $area_solicitante = $fila1->area_solicitante;
    $convocatoria = $fila1->convocatoria;
    $resultado_curricular = $fila1->resultado_curricular;
    $otras_evaluaciones = $fila1->otras_evaluaciones;
    $publicacion_final = $fila1->publicacion_final;
    $comunicados = $fila1->comunicados;
    $observaciones = $fila1->observaciones;
    $convocatorias [] = array(
        'codigo' => $codigo,
        'descripcion' => $descripcion,
        'area_solicitante' => $area_solicitante,
        'convocatoria' => $convocatoria,
        'resultado_curricular' => $resultado_curricular,
        'otras_evaluaciones' => $otras_evaluaciones,
        'publicacion_final' => $publicacion_final,
        'comunicados' => $comunicados,
        'observaciones' => $observaciones
    );
}
echo json_encode($convocatorias);
